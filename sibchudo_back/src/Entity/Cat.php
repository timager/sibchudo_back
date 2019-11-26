<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;

/**
 * Class TestEntity
 * @Table(name="cat")
 */
class Cat implements EntityInterface {

    const MALE = "male";
    const FEMALE = "female";
    const SALE = "sale";
    const RESERVED = "reserved";
    const DEAD = "dead";
    const OWN = "own";
    const OTHER = "other";

    /**
     * @Field(name="id")
     */
    private $id;

    /**
     * @Field(name="name")
     */
    private $name;

    /**
     * @Field(name="color")
     */
    private $colorId;

    /**
     * @Field(name="litter")
     */
    private $litterId;

    /**
     * @Field(name="status")
     */
    private $status;

    /**
     * @Field(name="community")
     */
    private $communityId;

    /**
     * @Field(name="gender")
     */
    private $gender;

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getColorId() {
        return $this->colorId;
    }

    /**
     * @param mixed $colorId
     */
    public function setColorId($colorId) {
        $this->colorId = $colorId;
    }

    /**
     * @return mixed
     */
    public function getLitterId() {
        return $this->litterId;
    }

    /**
     * @param mixed $litterId
     */
    public function setLitterId($litterId) {
        $this->litterId = $litterId;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCommunityId() {
        return $this->communityId;
    }

    /**
     * @param mixed $communityId
     */
    public function setCommunityId($communityId) {
        $this->communityId = $communityId;
    }

    /**
     * @return mixed
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender) {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getId():int {
        return $this->id;
    }


}