<?php


namespace App\Repository\DataSetter;


interface DataSetterInterface
{
    function setData(array $data, $entity);
}