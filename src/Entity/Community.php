<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommunityRepository")
 */
class Community {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Owner", inversedBy="communities")
     */
    private $leader;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contact")
     */
    private $contacts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Litter", mappedBy="community", orphanRemoval=true)
     * @Serializer\Exclude()
     */
    private $litters;

    public function __construct() {
        $this->contacts = new ArrayCollection();
        $this->litters = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string {
        return $this->address;
    }

    public function setAddress(?string $address): self {
        $this->address = $address;

        return $this;
    }

    public function getLeader(): ?Owner {
        return $this->leader;
    }

    public function setLeader(?Owner $leader): self {
        $this->leader = $leader;

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self {
        if(!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
        }

        return $this;
    }

    public function removeContact(Contact $contact): self {
        if($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
        }

        return $this;
    }

    /**
     * @return Collection|Litter[]
     */
    public function getLitters(): Collection {
        return $this->litters;
    }

    public function addLitter(Litter $litter): self {
        if(!$this->litters->contains($litter)) {
            $this->litters[] = $litter;
            $litter->setCommunity($this);
        }

        return $this;
    }

    public function removeLitter(Litter $litter): self {
        if($this->litters->contains($litter)) {
            $this->litters->removeElement($litter);
            // set the owning side to null (unless already changed)
            if($litter->getCommunity() === $this) {
                $litter->setCommunity(null);
            }
        }

        return $this;
    }
}
