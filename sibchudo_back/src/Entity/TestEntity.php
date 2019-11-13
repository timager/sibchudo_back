<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;

/**
 * Class TestEntity
 * @Table(name="test")
 */
class TestEntity
{

    /**
     * @Field(name="id", type="integer", primary=true)
     */
    private $id;
    /**
     * @Field(name="govno", type="text")
     */
    private $govno;
    /**
     * @Field(name="mocha", type="bool")
     */
    private $mocha;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGovno()
    {
        return $this->govno;
    }

    /**
     * @param mixed $govno
     */
    public function setGovno($govno)
    {
        $this->govno = $govno;
    }

    /**
     * @return mixed
     */
    public function getMocha()
    {
        return $this->mocha;
    }

    /**
     * @param mixed $mocha
     */
    public function setMocha($mocha)
    {
        $this->mocha = $mocha;
    }



}