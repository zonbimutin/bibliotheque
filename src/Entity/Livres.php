<?php

namespace App\Entity;

use App\Repository\LivresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivresRepository::class)
 */
class Livres
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $pageNum;

    /**
     * @ORM\ManyToMany(targetEntity=auteurs::class, inversedBy="livres")
     */
    private $auteurs;

    /**
     * @ORM\ManyToOne(targetEntity=bibliotheques::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliotheque;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPageNum(): ?int
    {
        return $this->pageNum;
    }

    public function setPageNum(int $pageNum): self
    {
        $this->pageNum = $pageNum;

        return $this;
    }

    /**
     * @return Collection|auteurs[]
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(auteurs $auteur): self
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(auteurs $auteur): self
    {
        if ($this->auteurs->contains($auteur)) {
            $this->auteurs->removeElement($auteur);
        }

        return $this;
    }

    public function getBibliotheque(): ?bibliotheques
    {
        return $this->bibliotheque;
    }

    public function setBibliotheque(?bibliotheques $bibliotheque): self
    {
        $this->bibliotheque = $bibliotheque;

        return $this;
    }
}
