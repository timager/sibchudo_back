<?php


namespace App\Repository\DataSetter;


use App\Annotation\Field;
use App\Entity\EntityInterface;
use App\Entity\LazyEntity;
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
                if($field->getType() !== null && $data[$field->getName()] !== null){
                    $lazy = new LazyEntity($data[$field->getName()], $field->getType(), $this->reader);
                    $property->setValue($entity, $lazy);
                }else{
                    $type = $property->getType();
                    $typeName = $type !== null ? $type->getName() : null;
                    if($typeName === "DateTime")
                        $property->setValue($entity, new $typeName($data[$field->getName()]));
                    else
                        $property->setValue($entity, $data[$field->getName()]);
                }
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