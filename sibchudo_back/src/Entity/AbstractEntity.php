<?php


namespace App\Entity;


abstract class AbstractEntity implements EntityInterface {


    public function load(EntityInterface $entity = null): ?EntityInterface {
        if($entity instanceof LazyEntity){
            return $entity->load();
        } else{
            return $entity;
        }
    }

    public function loadArray(array $entities = null): array {
        if(count($entities) === 1 && $entities[0] instanceof LazyInvertedEntity)
            return $entities[0]->loadArray();
        return $entities;
    }
}