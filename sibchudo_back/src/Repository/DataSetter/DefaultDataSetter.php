<?php


namespace App\Repository\DataSetter;


use App\Annotation\Field;
use App\Entity\EntityInterface;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;

class DefaultDataSetter implements DataSetterInterface
{

    protected $reader;

    /**
     * DefaultDataSetter constructor.
     * @param $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }


    public function setData(array $data, EntityInterface $entity){
        $reflection = new ReflectionClass(get_class($entity));
        $reflectionsFields = $reflection->getProperties();
        foreach ($reflectionsFields as $property){
            $field = $this->reader->getPropertyAnnotation($property, Field::class);
            if($field !== null && array_key_exists($field->getName(), $data)){
                $property->setAccessible(true);
                $property->setValue($entity, $data[$field->getName()]);
            }
        }
        return $entity;
    }

    public function getData(EntityInterface $entity){
        $data = [];
        $reflection = new ReflectionClass(get_class($entity));
        $reflectionsFields = $reflection->getProperties();
        foreach ($reflectionsFields as $property){
            $field = $this->reader->getPropertyAnnotation($property, Field::class);
            if($field !== null){
                $property->setAccessible(true);
                if($field->getName()!=='id'){
                    $data[$field->getName()] = $property->getValue($entity);
                }
            }
        }
        return $data;
    }

    function addId(EntityInterface $entity, $id) {
        $reflection = new ReflectionClass(get_class($entity));
        $reflectionsFields = $reflection->getProperties();
        foreach ($reflectionsFields as $property){
            $field = $this->reader->getPropertyAnnotation($property, Field::class);
            if($field !== null && $field->getName() == "id"){
                $property->setAccessible(true);
                $property->setValue($entity, $id);
            }
        }
    }
}