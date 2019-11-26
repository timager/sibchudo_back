<?php


namespace App\Repository;


use App\Annotation\Table;
use App\DatabaseConnector\Database;
use App\Entity\EntityInterface;
use App\Repository\DataSetter\DataSetterInterface;
use App\Repository\DataSetter\DefaultDataSetter;
use Doctrine\Common\Annotations\Reader;
use Exception;
use ReflectionClass;

abstract class AbstractRepository implements RepositoryInterface {

    protected $reader;

    /**
     * AbstractRepository constructor.
     * @param $reader
     */
    public function __construct(Reader $reader) {
        $this->reader = $reader;
    }


    protected function makeArrayOfEntity(DataSetterInterface $dataSetter, array $array) {
        $objects = [];
        foreach($array as $datum) {
            $objects[] = $this->makeEntity($dataSetter, $datum);
        }
        return $objects;
    }

    protected function makeEntity(DataSetterInterface $dataSetter, array $array) {
        $class = $this->getEntityClass();
        $obj = new $class();
        $dataSetter->setData($array, $obj);
        return $obj;
    }

    /**
     * @return EntityInterface[]
     */
    public function getAll(): array {
        $query = 'select * from ' . $this->getTable();
        $data = Database::getInstance()->makeQuery($query);
        $objects = $this->makeArrayOfEntity(new DefaultDataSetter($this->reader), $data);
        return $objects;
    }

    public function getById($id): ?EntityInterface {
        $query = 'select * from ' . $this->getTable() . ' where id=$1';
        $data = Database::getInstance()->makeQuery($query, [$id]);
        if($data && count($data) == 1) {
            $object = $this->makeEntity(new DefaultDataSetter($this->reader), $data[0]);
            return $object;
        }
        return null;
    }


    public function getTable(): string {
        $reflection = new ReflectionClass($this->getEntityClass());
        $table = $this->reader->getClassAnnotation($reflection, Table::class);
        return $table->getName();
    }


    /**
     * @param EntityInterface $entity
     * @return int|null
     * @throws Exception
     */
    public function delete(EntityInterface $entity): ?int {
        if(is_null($entity)) {
            throw new Exception("entity not found", 404);
        }
        $query = "delete from " . $this->getTable() . " where id=$1 returning id";
        $data = Database::getInstance()->makeQuery($query, [$entity->getId()]);
        if(empty($data[0]['id'])) {
            return null;
        } else {
            return $data[0]['id'];
        }
    }

    public function insert($entity): ?int {
        $dataSetter = new DefaultDataSetter($this->reader);
        $fields = $dataSetter->getData($entity);
        $query = 'insert into ' . $this->getTable() . '(' . join(",", array_keys($fields)) . ') 
        values (' . $this->getInsertValuesString($fields) . ') returning id;';
        dump($query,$fields);
        $data = Database::getInstance()->makeQuery($query, array_values($fields));
        if(isset($data[0]['id'])) {
            $dataSetter->addId($entity, $data[0]['id']);
            return $data[0]['id'];
        } else {
            return null;
        }
    }

    public function update(EntityInterface $entity): ?int {
        $dataSetter = new DefaultDataSetter($this->reader);
        $fields = $dataSetter->getData($entity);
        $query = 'update ' . $this->getTable() . " set " . $this->getUpdateValuesString($fields) . "where id=$" . (count($fields) + 1) . " returning id;";
        $values = array_values($fields);
        $values[] = $entity->getId();
        $data = Database::getInstance()->makeQuery($query, $values);
        if(isset($data[0]['id'])) {
            $dataSetter->addId($entity, $data[0]['id']);
            return $data[0]['id'];
        } else {
            return null;
        }
    }

    private function getUpdateValuesString($fields) {
        $fieldsNames = array_keys($fields);
        $i = 1;
        $res = [];
        foreach($fieldsNames as $fieldsName) {
            $res[] = $fieldsName . "=$" . $i;
            $i++;
        }
        return join(",", $res);
    }

    private function getInsertValuesString($fields) {
        return join(',', array_map(function($key) {
            return "$" . $key;
        }, range(1, count($fields))));
    }
}
