<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use DateTime;

/**
 * Class Litter
 * @package App\Entity
 * @Table(name="litter")
 */
class Litter implements EntityInterface {

    /**
     * @Field(name="id")
     */
    private int $id;
    /**
     * @Field(name="mather")
     */
    private int $matherId;
    /**
     * @Field(name="father")
     */
    private int $fatherId;
    /**
     * @Field(name="birthday")
     */
    private DateTime $birthday;
    /**
     * @Field(name="community")
     */
    private int $communityId;
    /**
     * @Field(name="litter")
     */
    private int $litterId;

    /**
     * @return int
     */
    public function getMatherId(): int {
        return $this->matherId;
    }

    /**
     * @param int $matherId
     */
    public function setMatherId(int $matherId): void {
        $this->matherId = $matherId;
    }

    /**
     * @return int
     */
    public function getFatherId(): int {
        return $this->fatherId;
    }

    /**
     * @param int $fatherId
     */
    public function setFatherId(int $fatherId): void {
        $this->fatherId = $fatherId;
    }

    /**
     * @return DateTime
     */
    public function getBirthday(): DateTime {
        return $this->birthday;
    }

    /**
     * @param DateTime $birthday
     */
    public function setBirthday(DateTime $birthday): void {
        $this->birthday = $birthday;
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
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

}