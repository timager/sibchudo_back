<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CatRepository")
 */
class Cat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $gender;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="cat")
     * @Serializer\MaxDepth(2)
     */
    private $media;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Color", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\MaxDepth(4)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CatClass")
     * @Serializer\MaxDepth(1)
     */
    private $catClass;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Title")
     * @Serializer\MaxDepth(1)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Litter", inversedBy="cats")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\MaxDepth(2)
     */
    private $litter;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Media", cascade={"persist", "remove"})
     * @Serializer\MaxDepth(1)
     */
    private $avatar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Community")
     * @Serializer\MaxDepth(1)
     */
    private $community;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Owner")
     * @Serializer\MaxDepth(1)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CatStatus")
     * @Serializer\MaxDepth(1)
     */
    private $status;


    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedia(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setCat($this);
        }

        return $this;
    }

    public function removeMedia(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getCat() === $this) {
                $medium->setCat(null);
            }
        }

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCatClass(): ?CatClass
    {
        return $this->catClass;
    }

    public function setCatClass(?CatClass $catClass): self
    {
        $this->catClass = $catClass;

        return $this;
    }

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    public function setTitle(?Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLitter(): ?Litter
    {
        return $this->litter;
    }

    public function setLitter(?Litter $litter): self
    {
        $this->litter = $litter;

        return $this;
    }

    public function getAvatar(): ?Media
    {
        return $this->avatar;
    }

    public function setAvatar(?Media $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getCommunity(): ?Community
    {
        return $this->community;
    }

    public function setCommunity(?Community $community): self
    {
        $this->community = $community;

        return $this;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getStatus(): ?CatStatus
    {
        return $this->status;
    }

    public function setStatus(?CatStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

}
