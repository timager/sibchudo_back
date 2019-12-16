<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Accessor;

/**
 * @Table(name="cat",repository="App\Repository\CatRepository")
 */
class Cat extends AbstractEntity {

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
     * @Field(name="color", type="App\Entity\Color")
     * @Accessor(getter="getColor")
     * @Serializer\MaxDepth(4)
     */
    private EntityInterface $color;

    /**
     * @Field(name="litter", type="App\Entity\Litter")
     * @Accessor(getter="getLitter")
     * @Serializer\MaxDepth(2)
     */
    private EntityInterface $litter;

    /**
     * @Field(name="status")
     */
    private string $status;

    /**
     * @Field(name="community", type="App\Entity\Community")
     * @Accessor(getter="getCommunity")
     * @Serializer\MaxDepth(1)
     */
    private ?EntityInterface $community;

    /**
     * @Field(name="gender")
     */
    private string $gender;

    /**
     * @Field(name="owner", type="App\Entity\Owner")
     * @Accessor(getter="getOwner")
     * @Serializer\MaxDepth(1)
     */
    private ?EntityInterface $owner;

    /**
     * @Field(name="title", type="App\Entity\Title")
     * @Accessor(getter="getTitle")
     * @Serializer\MaxDepth(1)
     */
    private ?EntityInterface $title;

    /**
     * @Field(name="class", type="App\Entity\CatClass")
     * @Accessor(getter="getCatClass")
     * @Serializer\MaxDepth(1)
     */
    private EntityInterface $catClass;

    /**
     * @Field(name="avatar", type="App\Entity\Media")
     * @Accessor(getter="getAvatar")
     * @Serializer\MaxDepth(1)
     */
    private EntityInterface $avatar;

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void {
        $this->name = $name;
    }

    /**
     * @return Color|EntityInterface
     */
    public function getColor(): Color {
        return $this->load($this->color);
    }

    /**
     * @param Color $color
     */
    public function setColor(Color $color): void {
        $this->color = $color;
    }

    /**
     * @return EntityInterface|Litter
     */
    public function getLitter(): Litter {
        return $this->load($this->litter);
    }

    /**
     * @param $litter
     */
    public function setLitter($litter): void {
        $this->litter = $litter;
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
    public function setStatus($status): void {
        $this->status = $status;
    }

    /**
     * @return Community|EntityInterface
     */
    public function getCommunity(): ?Community {
        return $this->load($this->community);
    }

    /**
     * @param Community $community
     */
    public function setCommunity($community): void {
        $this->community = $community;
    }

    /**
     * @return EntityInterface|Owner
     */
    public function getOwner(): Owner {
        return $this->load($this->owner);
    }

    /**
     * @param Owner $owner
     */
    public function setOwner(Owner $owner): void {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCatClass() {
        return $this->catClass;
    }

    /**
     * @param mixed $catClass
     */
    public function setCatClass($catClass): void {
        $this->catClass = $catClass;
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

    /**
     * @return EntityInterface|Media|null
     */
    public function getAvatar() {
        return $this->load($this->avatar);
    }

    /**
     * @param Media|null $avatar
     */
    public function setAvatar(?Media $avatar): void {
        $this->avatar = $avatar;
    }


    public function getId(): int {
        return $this->id;
    }
}