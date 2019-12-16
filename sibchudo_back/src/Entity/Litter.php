<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use DateTime;
use JMS\Serializer\Annotation\Accessor;

/**
 * Class Litter
 * @package App\Entity
 * @Table(name="litter",repository="App\Repository\LitterRepository")
 */
class Litter extends AbstractEntity {
    /**
     * @Field(name="id")
     */
    private int $id;
    /**
     * @Field(name="mather", type="App\Entity\Cat")
     * @Accessor(getter="getMather")
     */
    private ?EntityInterface $mather;
    /**
     * @Field(name="father", type="App\Entity\Cat")
     * @Accessor(getter="getFather")
     */
    private ?EntityInterface $father;
    /**
     * @Field(name="birthday")
     */
    private DateTime $birthday;

    /**
     * @Field(name="community", type="App\Entity\Community")
     * @Accessor(getter="getCommunity")
     */
    private EntityInterface $community;

    /**
     * @return Cat|EntityInterface|null
     */
    public function getMather(): ?Cat {
        return $this->load($this->mather);
    }

    /**
     * @param Cat $mather
     */
    public function setMather(Cat $mather): void {
        $this->mather = $mather;
    }

    /**
     * @return Cat|EntityInterface|null
     */
    public function getFather(): ?Cat {
        return $this->load($this->father);
    }

    /**
     * @param Cat $father
     */
    public function setFather(Cat $father): void {
        $this->father = $father;
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
     * @return Community|EntityInterface|null
     */
    public function getCommunity() {
        return $this->load($this->community);
    }

    /**
     * @param EntityInterface $community
     */
    public function setCommunity(EntityInterface $community): void {
        $this->community = $community;
    }


    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

}