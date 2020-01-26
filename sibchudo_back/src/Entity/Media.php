<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use DateTime;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Accessor;

/**
 * Class TestEntity
 * @Table(name="media", repository="App\Repository\MediaRepository")
 */
class Media extends AbstractEntity {
    /**
     * @Field(name="id")
     */
    private int $id;

    /**
     * @Field(name="destination")
     */
    private string $destination;

    /**
     * @Field(name="upload_date")
     */
    private DateTime $uploadDate;

    /**
     * @Field(name="description")
     */
    private ?string $description = null;

    /**
     * @Field(name="cat", type="App\Entity\Cat")
     * @Accessor(getter="getCat")
     * @Serializer\Exclude()
     */
    private EntityInterface $cat;


    /**
     * @return mixed
     */
    public function getDestination() {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination): void {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getUploadDate() {
        return $this->uploadDate;
    }

    /**
     * @param mixed $uploadDate
     */
    public function setUploadDate($uploadDate): void {
        $this->uploadDate = $uploadDate;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCat() {
        return $this->load($this->cat);
    }

    /**
     * @param mixed $cat
     */
    public function setCat($cat): void {
        $this->cat = $cat;
    }


    public function getId(): int {
        return $this->id;
    }
}