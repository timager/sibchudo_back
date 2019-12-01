<?php


namespace App\Repository;


use App\Entity\Community;

class CommunityRepository extends AbstractRepository {

    private string $entity = Community::class;

    public function getEntityClass(): string {
        return $this->entity;
    }
}