<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $destination;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $uploadDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cat", inversedBy="media")
     */
    private ?Cat $cat;


    private ?string $dir = null;

    /**
     * Media constructor.
     */
    public function __construct()
    {
        $this->uploadDate = new DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getUploadDate(): ?DateTimeInterface
    {
        return $this->uploadDate;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCat(): ?Cat
    {
        return $this->cat;
    }

    public function setCat(?Cat $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function setDir(string $dir)
    {
        $this->dir = $dir;
    }
}
