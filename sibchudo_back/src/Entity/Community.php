<?php


namespace App\Entity;


use App\Annotation\Field;
use App\Annotation\Table;
use JMS\Serializer\Annotation\Accessor;

/**
 * Class Community
 * @package App\Entity
 * @Table(name="community",repository="App\Repository\CommunityRepository")
 */
class Community extends AbstractEntity {
    /**
     * @Field(name="id")
     */
    private int $id;

    /**
     * @Field(name="name")
     */
    private string $name;

    /**
     * @Field(name="description")
     */
    private string $description;

    /**
     * @Field(name="address")
     */
    private ?string $address;

    /**
     * @Field(name="contacts")
     */
    private ?string $contacts;

    /**
     * @Field(name="leader", type="App\Entity\Owner")
     * @Accessor(getter="getLeader")
     */
    private ?EntityInterface $leader;

    /**
     * @return int
     */
    public function getId(): int {
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
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getContacts(): ?string {
        return $this->contacts;
    }

    /**
     * @param string $contacts
     */
    public function setContacts(string $contacts): void {
        $this->contacts = $contacts;
    }

    /**
     * @return EntityInterface
     */
    public function getLeader(): ?EntityInterface {
        return $this->load($this->leader);
    }

    /**
     * @param EntityInterface $leader
     */
    public function setLeader(EntityInterface $leader): void {
        $this->leader = $leader;
    }

}