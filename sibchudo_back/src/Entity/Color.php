<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ColorRepository")
 */
class Color
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Breed")
     * @ORM\JoinColumn(nullable=false)
     */
    private $breed;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BaseColor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $baseColor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BaseColor")
     */
    private $baseColorAdditional;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $code0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $code1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $code2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $code3;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $tail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $eyes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorCode")
     */
    private $ears;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(?Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getBaseColor(): ?BaseColor
    {
        return $this->baseColor;
    }

    public function setBaseColor(?BaseColor $baseColor): self
    {
        $this->baseColor = $baseColor;

        return $this;
    }

    public function getBaseColorAdditional(): ?BaseColor
    {
        return $this->baseColorAdditional;
    }

    public function setBaseColorAdditional(?BaseColor $baseColorAdditional): self
    {
        $this->baseColorAdditional = $baseColorAdditional;

        return $this;
    }

    public function getCode0(): ?ColorCode
    {
        return $this->code0;
    }

    public function setCode0(?ColorCode $code0): self
    {
        $this->code0 = $code0;

        return $this;
    }

    public function getCode1(): ?ColorCode
    {
        return $this->code1;
    }

    public function setCode1(?ColorCode $code1): self
    {
        $this->code1 = $code1;

        return $this;
    }

    public function getCode2(): ?ColorCode
    {
        return $this->code2;
    }

    public function setCode2(?ColorCode $code2): self
    {
        $this->code2 = $code2;

        return $this;
    }

    public function getCode3(): ?ColorCode
    {
        return $this->code3;
    }

    public function setCode3(?ColorCode $code3): self
    {
        $this->code3 = $code3;

        return $this;
    }

    public function getTail(): ?ColorCode
    {
        return $this->tail;
    }

    public function setTail(?ColorCode $tail): self
    {
        $this->tail = $tail;

        return $this;
    }

    public function getEyes(): ?ColorCode
    {
        return $this->eyes;
    }

    public function setEyes(?ColorCode $eyes): self
    {
        $this->eyes = $eyes;

        return $this;
    }

    public function getEars(): ?ColorCode
    {
        return $this->ears;
    }

    public function setEars(?ColorCode $ears): self
    {
        $this->ears = $ears;

        return $this;
    }
}
