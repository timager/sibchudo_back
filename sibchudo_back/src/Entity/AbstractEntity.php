<?php


namespace App\Entity;


abstract class AbstractEntity implements EntityInterface {


    public function load($entity = null): ?EntityInterface {
        if($entity instanceof LazyEntity){
            return $entity->load();
        } else{
            return $entity;
        }
    }
}