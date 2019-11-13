<?php


namespace App\Repository;


use App\Annotation\Field;
use App\Annotation\Table;
use App\DatabaseConnector\Database;
use App\Repository\DataSetter\DataSetterInterface;
use App\Repository\DataSetter\DefaultDataSetter;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;

abstract class AbstractRepository implements RepositoryInterface
{

    protected $reader;

    /**
     * AbstractRepository constructor.
     * @param $reader
     */
    public function __construct($reader)
    {
        $this->reader = $reader;
    }


    protected function makeArrayOfEntity(DataSetterInterface $dataSetter, array $array){
        $objects = [];
        foreach ($array as $datum) {
            $objects[] = $this->makeEntity($dataSetter, $datum);
        }
        return $objects;
    }

    protected function makeEntity(DataSetterInterface $dataSetter, array $array){
        $class = $this->getEntityClass();
        $obj = new $class();
        $dataSetter->setData($array, $obj);
        return $obj;
    }

    public function getAll()
    {
        $query = 'SELECT * FROM ' . $this->getTable();
        $data = Database::getInstance()->makeQuery($query);
        $objects = $this->makeArrayOfEntity(new DefaultDataSetter(), $data);
        return $objects;
    }

//    public function persist($entity)
//    {
//        $propsData =
//        return $objects;
//    }

    public function getTable():string{
        $reflection = new ReflectionClass($this->getEntityClass());
        $table = $this->reader->getClassAnnotation($reflection, Table::class);
        return $table->getName();
    }

    public static function getFieldPropertiesAnnotation(Reader $reader, string $entityClass){
        $reflection = new ReflectionClass($entityClass);
        $data = [];
        $props = $reflection->getProperties();
        foreach ($props as $name => $reflectionProperty){
            $fieldAnnotation = $reader->getPropertyAnnotation($reflectionProperty, Field::class);
            if($fieldAnnotation != null){
                $data[] = $fieldAnnotation;
            }
        }
        return $data;
    }

}