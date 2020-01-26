<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use DateTime;
use JMS\Serializer\Annotation as Serializer;
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
     * @Field(name="letter")
     */
    private string $letter;

    /**
     * @Field(name="mother", type="App\Entity\Cat")
     * @Accessor(getter="getMother")
     * @Serializer\MaxDepth(3)
     */
    private ?EntityInterface $mother;
    /**
     * @Field(name="father", type="App\Entity\Cat")
     * @Accessor(getter="getFather")
     * @Serializer\MaxDepth(3)
     */
    private ?EntityInterface $father;
    /**
     * @Field(name="birthday")
     */
    private DateTime $birthday;

    /**
     * @Field(name="community", type="App\Entity\Community")
     * @Accessor(getter="getCommunity")
     * @Serializer\MaxDepth(2)
     */
    private EntityInterface $community;

    /**
     * @return Cat|EntityInterface|null
     */
    public function getMother(): ?Cat {
        return $this->load($this->mother);
    }

    /**
     * @param Cat $mother
     */
    public function setMother(Cat $mother): void {
        $this->mother = $mother;
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
     * @return string
     */
    public function getLetter(): string {
        return $this->letter;
    }




    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

}