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
    private int $id;

    /**
     * @Field(name="name")
     */
    private string $name;

    /**
     * @Field(name="color")
     */
    private int $colorId;

    /**
     * @Field(name="litter")
     */
    private int $litterId;

    /**
     * @Field(name="status")
     */
    private string $status;

    /**
     * @Field(name="community")
     */
    private int $communityId;

    /**
     * @Field(name="gender")
     */
    private string $gender;

    /**
     * @return int
     */
    public function getId():int {
        return $this->id;
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
     * @return int
     */
    public function getColorId(): int {
        return $this->colorId;
    }

    /**
     * @param int $colorId
     */
    public function setColorId(int $colorId): void {
        $this->colorId = $colorId;
    }

    /**
     * @return int
     */
    public function getLitterId(): int {
        return $this->litterId;
    }

    /**
     * @param int $litterId
     */
    public function setLitterId(int $litterId): void {
        $this->litterId = $litterId;
    }

    /**
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCommunityId(): int {
        return $this->communityId;
    }

    /**
     * @param int $communityId
     */
    public function setCommunityId(int $communityId): void {
        $this->communityId = $communityId;
    }

    /**
     * @return string
     */
    public function getGender(): string {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void {
        $this->gender = $gender;
    }


}