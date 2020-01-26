<?php


namespace App\Entity;


use App\Annotation\Table;
use App\Repository\AbstractRepository;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;
use Symfony\Component\Config\Definition\Exception\Exception;

class LazyInvertedEntity implements EntityInterface {

    protected int $value;
    protected string $field;
    protected string $class;
    protected Reader $reader;
    protected string $role;

    /**
     * LazyInvertedEntity constructor.
     * @param int $value
     * @param string $field
     * @param string $class
     * @param Reader $reader
     */
    public function __construct(int $value, string $field, string $class, Reader $reader, string $role) {
        $this->value = $value;
        $this->field = $field;
        $this->class = $class;
        $this->reader = $reader;
        $this->role = $role;

    }


    /**
     * @return int
     */
    public function getValue(): int {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getField(): int {
        return $this->field;
    }

    /**
     * @return Reader
     */
    public function getReader(): Reader {
        return $this->reader;
    }


    public function getId(): int {
        throw new Exception("Not supported yet");
    }

    /**
     * @return string
     */
    public function getClass(): string {
        return $this->class;
    }

    public function loadArray():array{
        $reflection = new ReflectionClass($this->class);
        $table = $this->reader->getClassAnnotation($reflection, Table::class);
        $repositoryClass = $table->getRepository();
        $repository = new $repositoryClass($this->reader, $this->role);
        if($repository instanceof AbstractRepository)
            return $repository->getBy([$this->field => [
                "value" => $this->value,
                "sign" => "="
            ]]);
        return [];
    }

    public function load(): ?EntityInterface {
        $entities = $this->loadArray();
        if(count($entities) === 1)
            return $entities[0];
        if(count($entities) === 0)
            return null;
        throw new Exception("More then one result");
    }
}