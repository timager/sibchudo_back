<?php

namespace App\Repository;


use App\Entity\Media;

class MediaRepository extends AbstractRepository
{

    private string $entity = Media::class;

    public function getEntityClass(): string
    {
        return $this->entity;
    }
}
