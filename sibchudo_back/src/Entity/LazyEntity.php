<?php


namespace App\Entity;


use App\Annotation\Table;
use App\Repository\AbstractRepository;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;
use Symfony\Component\Config\Definition\Exception\Exception;

class LazyEntity implements EntityInterface {

    protected int $id;
    protected string $class;
    protected Reader $reader;
    protected string $role;


    /**
     * LazyEntity constructor.
     * @param int $id
     * @param string $class
     * @param Reader $reader
     */
    public function __construct(int $id, string $class, Reader $reader, string $role) {
        $this->id = $id;
        $this->class = $class;
        $this->reader = $reader;
        $this->role = $role;
    }


    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getClass(): string {
        return $this->class;
    }

    public function load():?EntityInterface{
        $reflection = new ReflectionClass($this->class);
        $table = $this->reader->getClassAnnotation($reflection, Table::class);
        $repositoryClass = $table->getRepository();
        $repository = new $repositoryClass($this->reader, $this->role);
        return $repository->getById($this->id);
    }

    public function loadArray(): array {
        throw new Exception("Not supported loadArray in LazyEntity");
    }
}