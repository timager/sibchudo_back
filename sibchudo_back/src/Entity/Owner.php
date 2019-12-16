<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use DateTime;
use JMS\Serializer\Annotation\Accessor;

/**
 * Class TestEntity
 * @Table(name="owner",repository="App\Repository\OwnerRepository")
 */
class Owner extends AbstractEntity
{
    /**
     * @Field(name="id")
     */
    private int $id;

    /**
     * @Field(name="name")
     */
    private string $name;

    /**
     * @Field(name="contacts")
     */
    private string $contacts;

    /**
     * @Field(name="avatar", type="App\Entity\Media")
     * @Accessor(getter="getAvatar")
     */
    private ?EntityInterface $avatar;

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
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts): void
    {
        $this->contacts = $contacts;
    }

    /**
     * @return mixed
     */
    public function getAvatar():?Media
    {
        return $this->load($this->avatar);
    }

    /**
     * @param Media|null $avatar
     */
    public function setAvatar(?Media $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getId(): int
    {
        return $this->id;
    }
}