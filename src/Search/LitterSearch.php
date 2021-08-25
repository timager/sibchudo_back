<?php


namespace App\Search;


use Doctrine\ORM\QueryBuilder;
use LogicException;

class LitterSearch extends AbstractSearch
{


    public function joinAlias(QueryBuilder $builder, string $alias): void
    {
        switch ($alias) {
            case 'm':
                $builder->leftJoin('l.mother', $alias);
                break;
            case 'f':
                $builder->leftJoin('l.father', $alias);
                break;
            default:
                throw new LogicException('Невозможно заджойнить алиас '.$alias);
        }
    }

    public function getFields(): array
    {
        return [
            'm.name' => AbstractSearch::DEFAULT,
            'f.name' => AbstractSearch::DEFAULT,
            'l.letter' => AbstractSearch::STRICT,
            'l.birthday' => AbstractSearch::DATE,
            'm.id' => AbstractSearch::STRICT,
            'f.id' => AbstractSearch::STRICT
        ];
    }
}