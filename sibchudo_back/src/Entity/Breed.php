<?php


namespace App\Entity;


use App\Annotation\Field;
use App\Annotation\Table;

/**
 * Class Breed
 * @package App\Entity
 * @Table(name="breed",repository="App\Repository\BreedRepository")
 */
class Breed extends AbstractEntity {

    /**
     * @Field(name="id")
     */
    private int $id;
    /**
     * @Field(name="code")
     */
    private ?string $code;
    /**
     * @Field(name="name")
     */
    private string $name;
    /**
     * @Field(name="name_ru")
     */
    private ?string $nameRu;

    /**
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNameRu(): string {
        return $this->nameRu;
    }

    /**
     * @param string $nameRu
     */
    public function setNameRu(string $nameRu): void {
        $this->nameRu = $nameRu;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
}