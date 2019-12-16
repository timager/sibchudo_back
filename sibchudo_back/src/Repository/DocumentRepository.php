<?php

namespace App\Repository;


use App\Entity\Document;

class DocumentRepository extends AbstractRepository
{

    private string $entity = Document::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
