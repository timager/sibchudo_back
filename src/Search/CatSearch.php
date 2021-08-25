<?php


namespace App\Search;


use DateInterval;
use DateTime;
use Doctrine\ORM\QueryBuilder;
use JetBrains\PhpStorm\Pure;
use LogicException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CatSearch extends AbstractSearch
{


    public function joinAlias(QueryBuilder $builder, string $alias): void
    {
        switch ($alias) {
            case 'l':
                $builder->join('c.litter', $alias);
                break;
            default:
                throw new LogicException('Невозможно заджойнить алиас '.$alias);
        }
    }

    public function getFields(): array
    {
        return [
            'c.name' => AbstractSearch::DEFAULT,
            'c.gender' => AbstractSearch::STRICT,
            'l.birthday' => AbstractSearch::DATE
        ];
    }
}