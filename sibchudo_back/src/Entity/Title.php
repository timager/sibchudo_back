<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use DateTime;

/**
 * Class TestEntity
 * @Table(name="title",repository="App\Repository\TitleRepository")
 */
class Title extends AbstractEntity
{
    /**
     * @Field(name="id")
     */
    private int $id;

    /**
     * @Field(name="code")
     */
    private string $code;

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
    private string $description;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameRu()
    {
        return $this->nameRu;
    }

    /**
     * @param mixed $nameRu
     */
    public function setNameRu($nameRu): void
    {
        $this->nameRu = $nameRu;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }
}