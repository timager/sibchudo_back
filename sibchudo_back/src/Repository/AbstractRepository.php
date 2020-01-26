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
use Symfony\Component\Config\Definition\Exception\Exception as ExceptionD;

abstract class AbstractRepository implements RepositoryInterface {

    protected Reader $reader;
    protected string $role;

    public function __construct(Reader $reader, string $role) {
        $this->reader = $reader;
        $this->role = $role;
        Database::init($role);
    }

    protected function makeArrayOfEntity(DataSetterInterface $dataSetter, ?array $array) {
        $objects = [];
        foreach ($array as $datum) {
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
        return $this->makeArrayOfEntity(new DefaultDataSetter($this->reader, $this->role), $data ? $data : []);
    }

    public function getById($id): ?EntityInterface {
        $query = 'select * from ' . $this->getTable() . ' where id=$1';
        $data = Database::getInstance()->makeQuery($query, [$id]);
        if ($data && count($data) == 1) {
            return $this->makeEntity(new DefaultDataSetter($this->reader, $this->role), $data[0]);
        }
        return null;
    }

    public function count(array $criteria, ?int $limit = null, ?int $offset = null): int {
        $query = 'select count(*) as cnt from ' . $this->getTable() . ' where ' .  $this->makeQueryCriteria($criteria);
        if ($limit) {
            $query .= " limit " . $limit;
        }
        if ($offset) {
            $query .= " offset " . $offset;
        }
        $values = array_map(function ($value) {
            return $value['value'];
        }, $criteria);
        $data = Database::getInstance()->makeQuery($query, $values);
        return $data[0]['cnt'] ?? 0;
    }

    const ALLOWED_SIGNS = [
        "=",
        ">",
        "<",
        "<=",
        ">=",
        "LIKE",
    ];

    private function makeQueryCriteria(array $criteria) {
        $queryCriteria = [];
        if (count($criteria)) {
            for ($i = 1; $i <= count($criteria); $i++) {
                $sign = $criteria[array_keys($criteria)[$i - 1]]['sign'];
                $field = array_keys($criteria)[$i - 1];
                if (!in_array($sign, self::ALLOWED_SIGNS)) {
                    throw new ExceptionD("NOT ALLOWED SIGNS");
                }
                $queryCriteria[] = $field . " " . $sign . " $" . $i;
            }
        } else {
            $queryCriteria[] = "true";
        }
        return join(", ",$queryCriteria);
    }

    const ALLOWED_DIRS = ["desc", "asc"];

    private function makeOrder($order) {
        $orderPiece = [];
        foreach ($order as $field => $dir) {
            if (in_array($dir, self::ALLOWED_DIRS)) {
                $orderPiece[] = $field . " " . $dir;
            } else {
                throw new ExceptionD("NOT ALLOWED DIRS");
            }
        }
        if (count($orderPiece) > 0) {
            return " order by " . join(",", $orderPiece);
        }
        return "";
    }

    public function getBy(array $criteria, ?int $limit = null, ?int $offset = null, ?array $order = null): array {
        $query = 'select * from ' . $this->getTable() . ' where ' . $this->makeQueryCriteria($criteria);
        if (!empty($order)) {
            $query .= $this->makeOrder($order);
        }
        if ($limit) {
            $query .= " limit " . $limit;
        }
        if ($offset) {
            $query .= " offset " . $offset;
        }
        $values = array_map(function ($value) {
            return $value['value'];
        }, $criteria);
        $data = Database::getInstance()->makeQuery($query, $values);
        return $this->makeArrayOfEntity(new DefaultDataSetter($this->reader, $this->role), $data ? $data : []);
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
        if (is_null($entity)) {
            throw new Exception("entity not found", 404);
        }
        $query = "delete from " . $this->getTable() . " where id=$1 returning id";
        $data = Database::getInstance()->makeQuery($query, [$entity->getId()]);
        if (empty($data[0]['id'])) {
            return null;
        } else {
            return $data[0]['id'];
        }
    }

    public function insert($entity): ?int {
        $dataSetter = new DefaultDataSetter($this->reader, $this->role);
        $fields = $dataSetter->getData($entity);
        $query = 'insert into ' . $this->getTable() . '(' . join(",", array_keys($fields)) . ') 
        values (' . $this->getInsertValuesString($fields) . ') returning id;';
        $data = Database::getInstance()->makeQuery($query, array_values($fields));
        if (isset($data[0]['id'])) {
            $dataSetter->addId($entity, $data[0]['id']);
            return $data[0]['id'];
        } else {
            return null;
        }
    }

    public function update(EntityInterface $entity): ?int {
        $dataSetter = new DefaultDataSetter($this->reader, $this->role);
        $fields = $dataSetter->getData($entity);
        $query = 'update ' . $this->getTable() . " set " . $this->getUpdateValuesString($fields) . "where id=$" . (count($fields) + 1) . " returning id;";
        $values = array_values($fields);
        $values[] = $entity->getId();
        $data = Database::getInstance()->makeQuery($query, $values);
        if (isset($data[0]['id'])) {
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
        foreach ($fieldsNames as $fieldsName) {
            $res[] = $fieldsName . "=$" . $i;
            $i++;
        }
        return join(",", $res);
    }

    private function getInsertValuesString($fields) {
        return join(',', array_map(function ($key) {
            return "$" . $key;
        }, range(1, count($fields))));
    }
}
