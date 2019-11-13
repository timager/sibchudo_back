<?php


namespace App\Repository\DataSetter;


class DefaultDataSetter implements DataSetterInterface
{
    public function setData(array $data, $entity){
        foreach ($data as $field => $value){
            $entity->{"set" . ucfirst($field)}($value);
        }
        return $entity;
    }
}