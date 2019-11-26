<?php


namespace App\Repository\DataSetter;


use App\Entity\EntityInterface;

interface DataSetterInterface {
    function setData(array $data, EntityInterface $entity);

    function getData(EntityInterface $entity);

    function addId(EntityInterface $entity, $id);
}