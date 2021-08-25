<?php

namespace App\Search;

use DateInterval;
use DateTime;
use Doctrine\ORM\QueryBuilder;
use LogicException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

abstract class AbstractSearch implements Search
{

    public const DEFAULT = 'DEFAULT';
    public const DATE = 'DATE';
    public const STRICT = 'STRICT';

    private function addStrictSearch(QueryBuilder $builder, string $key, string $value): void
    {
        $parameter = str_replace('.', '_', $key);
        $builder->andWhere($builder->expr()->eq($key, ':'.$parameter));
        $builder->setParameter($parameter, $value);
    }

    private function addDefaultSearch(QueryBuilder $builder, string $key, string $value): void
    {
        $parameter = str_replace('.', '_', $key);
        $builder->andWhere($builder->expr()->like($key, ':'.$parameter));
        $builder->setParameter($parameter, '%'.$value.'%');
    }

    private function addDateSearch(QueryBuilder $builder, string $key, string $value): void
    {
        $parameter = str_replace('.', '_', $key);
        $builder->andWhere($builder->expr()->gte($key, ':'.$parameter.'__start'));
        $builder->andWhere($builder->expr()->lte($key, ':'.$parameter.'__end'));
        try {
            $builder->setParameter($parameter.'__start', new DateTime($value));
            $builder->setParameter($parameter.'__end', (new DateTime($value))->add(new DateInterval('P1D')));
        } catch (\Exception $e) {
            throw new BadRequestException('Неверный формат даты');
        }
    }

    public function buildSearch(QueryBuilder $builder, array $data): void
    {
        if (!$this->validate($data)) {
            throw new BadRequestException('Невалидный поиск');
        }
        foreach ($data as $k => $v) {
            $alias = explode('.', $k)[0];
            if (!in_array($alias, $builder->getAllAliases(), true)) {
                $this->joinAlias($builder, $alias);
            }
            switch ($this->getFields()[$k]) {
                case self::DATE:
                    $this->addDateSearch($builder, $k, $v);
                    break;
                case self::DEFAULT:
                    $this->addDefaultSearch($builder, $k, $v);
                    break;
                case self::STRICT:
                    $this->addStrictSearch($builder, $k, $v);
                    break;
                default:
                    throw new LogicException('Неизвестный тип поиска');
            }
        }
    }

    public function buildSort(QueryBuilder $builder, array $data): void
    {
        if (!$this->validate($data)) {
            throw new BadRequestException('Невалидная сортировка');
        }
        foreach ($data as $k => $v) {
            $alias = explode('.', $k)[0];
            if (!in_array($alias, $builder->getAllAliases(), true)) {
                $this->joinAlias($builder, $alias);
            }
            $builder->addOrderBy($k, $v);
        }
    }

    public function validate(array $data): bool
    {
        return count(array_diff_key($data, $this->getFields())) === 0;
    }

    public abstract function getFields(): array;
}