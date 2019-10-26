<?php


namespace App\Repository\DataSetter;


class DefaultDataSetter
{
    public function setData($data, $entity){
        foreach ($data as $field => $value){
            $entity->{"set" . ucfirst($field)}($value);
        }
        return $entity;
    }
}