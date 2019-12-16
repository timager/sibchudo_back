<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;

/**
 * @Table(name="class",repository="App\Repository\CatClassRepository")
 */
class CatClass extends AbstractEntity {

    /**
     * @Field(name="id")
     */
    private int $id;

    /**
     * @Field(name="name")
     */
    private string $name;

    /**
     * @Field(name="name_ru")
     */
    private string $nameRu;

    /**
     * @Field(name="description")
     */
    private ?string $description;


    /**
     * @return mixed
     */
    public function getNameRu() {
        return $this->nameRu;
    }

    /**
     * @param mixed $nameRu
     */
    public function setNameRu($nameRu): void {
        $this->nameRu = $nameRu;
    }


    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getName(): string {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void {
        $this->name = $name;
    }


    public function getId(): int {
        return $this->id;
    }
}