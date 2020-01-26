<?php


namespace App\Repository\DataSetter;


use App\Annotation\Field;
use App\Entity\EntityInterface;
use App\Entity\LazyEntity;
use App\Entity\LazyInvertedEntity;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;
use DateTime;

class DefaultDataSetter implements DataSetterInterface
{

    protected $reader;
    protected $role;

    /**
     * DefaultDataSetter constructor.
     * @param $reader
     */
    public function __construct(Reader $reader, string $role)
    {
        $this->role = $role;
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
                    $lazy = new LazyEntity($data[$field->getName()], $field->getType(), $this->reader, $this->role);
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
            if($field !== null && $field->getInvertedName() !== null && $field->getType() !== null){
                $property->setAccessible(true);
                $property->setValue($entity, [new LazyInvertedEntity($data['id'], $field->getInvertedName(), $field->getType(), $this->reader, $this->role)]);
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
            if($field !== null && $field->getName() !== null){
                $property->setAccessible(true);
                if($field->getName()!=='id'){
                    $value = $property->getValue($entity);
                    if($value instanceof EntityInterface){
                        $data[$field->getName()] = $value->getId();
                    }else if($value instanceof DateTime){
                        $data[$field->getName()] = $value->format("Y-m-d H:i:s");
                    }else{
                        $data[$field->getName()] = $value;
                    }
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