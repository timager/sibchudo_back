<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LitterRepository")
 */
class Litter {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $letter;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cat"}})
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @Serializer\MaxDepth(3)
     */
    private $mother;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cat")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @Serializer\MaxDepth(3)
     */
    private $father;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Community", inversedBy="litters")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\MaxDepth(2)
     */
    private $community;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cat", mappedBy="litter", orphanRemoval=true)
     * @Serializer\MaxDepth(3)
     */
    private $cats;

    public function __construct() {
        $this->cats = new ArrayCollection();
    }


    public function getId(): ?int {
        return $this->id;
    }

    public function getLetter(): ?string {
        return $this->letter;
    }

    public function setLetter(string $letter): self {
        $this->letter = $letter;

        return $this;
    }

    public function getMother(): ?Cat {
        return $this->mother;
    }

    public function setMother(?Cat $mother): self {
        $this->mother = $mother;

        return $this;
    }

    public function getFather(): ?Cat {
        return $this->father;
    }

    public function setFather(?Cat $father): self {
        $this->father = $father;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCommunity(): ?Community {
        return $this->community;
    }

    public function setCommunity(?Community $community): self {
        $this->community = $community;

        return $this;
    }

    /**
     * @return Collection|Cat[]
     */
    public function getCats(): Collection {
        return $this->cats;
    }

    public function addCat(Cat $cat): self {
        if (!$this->cats->contains($cat)) {
            $this->cats[] = $cat;
            $cat->setLitter($this);
        }

        return $this;
    }

    public function removeCat(Cat $cat): self {
        if ($this->cats->contains($cat)) {
            $this->cats->removeElement($cat);
            // set the owning side to null (unless already changed)
            if ($cat->getLitter() === $this) {
                $cat->setLitter(null);
            }
        }

        return $this;
    }

}
