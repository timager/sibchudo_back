<?php


namespace App\Search;


use Doctrine\ORM\QueryBuilder;
use LogicException;


class CatSearch extends AbstractSearch
{


    public function joinAlias(QueryBuilder $builder, string $alias): void
    {
        switch ($alias) {
            case 'l':
                $builder->leftJoin('c.litter', $alias);
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
            'l.birthday' => AbstractSearch::DATE,
            'l.id' => AbstractSearch::STRICT
        ];
    }
}