<?php

namespace App\Entity;

use App\Repository\ChevalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChevalRepository::class)]
class Cheval
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $race = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(inversedBy: 'cheval', cascade: ['persist', 'remove'])]
    private ?joueur $id_propietaire = null;

    #[ORM\OneToOne(mappedBy: 'id_cheval', cascade: ['persist', 'remove'])]
    private ?Etats $etats = null;

    #[ORM\OneToOne(mappedBy: 'id_cheval', cascade: ['persist', 'remove'])]
    private ?AttributsPhysiques $attributsPhysiques = null;

    #[ORM\OneToOne(mappedBy: 'id_cheval', cascade: ['persist', 'remove'])]
    private ?Autres $autres = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
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

    public function getIdPropietaire(): ?joueur
    {
        return $this->id_propietaire;
    }

    public function setIdPropietaire(?joueur $id_propietaire): self
    {
        $this->id_propietaire = $id_propietaire;

        return $this;
    }

    public function getEtats(): ?Etats
    {
        return $this->etats;
    }

    public function setEtats(Etats $etats): self
    {
        // set the owning side of the relation if necessary
        if ($etats->getIdCheval() !== $this) {
            $etats->setIdCheval($this);
        }

        $this->etats = $etats;

        return $this;
    }

    public function getAttributsPhysiques(): ?AttributsPhysiques
    {
        return $this->attributsPhysiques;
    }

    public function setAttributsPhysiques(AttributsPhysiques $attributsPhysiques): self
    {
        // set the owning side of the relation if necessary
        if ($attributsPhysiques->getIdCheval() !== $this) {
            $attributsPhysiques->setIdCheval($this);
        }

        $this->attributsPhysiques = $attributsPhysiques;

        return $this;
    }

    public function getAutres(): ?Autres
    {
        return $this->autres;
    }

    public function setAutres(Autres $autres): self
    {
        // set the owning side of the relation if necessary
        if ($autres->getIdCheval() !== $this) {
            $autres->setIdCheval($this);
        }

        $this->autres = $autres;

        return $this;
    }
}
