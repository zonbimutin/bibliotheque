<?php

namespace App\Entity;

use App\Repository\AuteursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuteursRepository::class)
 */
class Auteurs
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToMany(targetEntity=Livres::class, mappedBy="auteurs")
     */
    private $livres;

    /**
     * @ORM\OneToOne(targetEntity=Auteurs::class, cascade={"persist", "remove"})
     */
    private $ami;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|Livres[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livres $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->addAuteur($this);
        }

        return $this;
    }

    public function removeLivre(Livres $livre): self
    {
        if ($this->livres->contains($livre)) {
            $this->livres->removeElement($livre);
            $livre->removeAuteur($this);
        }

        return $this;
    }

    public function getAmi(): ?self
    {
        return $this->ami;
    }

    public function setAmi(?self $ami): self
    {
        $this->ami = $ami;

        return $this;
    }
}
