<?php

namespace App\Entity;

use App\Repository\FamilleItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleItemsRepository::class)]
class FamilleItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_famille_items = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nourriture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $litiere = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipement_cheval = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $soins = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFamilleItems(): ?int
    {
        return $this->id_famille_items;
    }

    public function setIdFamilleItems(int $id_famille_items): self
    {
        $this->id_famille_items = $id_famille_items;

        return $this;
    }

    public function getNourriture(): ?string
    {
        return $this->nourriture;
    }

    public function setNourriture(?string $nourriture): self
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    public function getLitiere(): ?string
    {
        return $this->litiere;
    }

    public function setLitiere(?string $litiere): self
    {
        $this->litiere = $litiere;

        return $this;
    }

    public function getEquipementCheval(): ?string
    {
        return $this->equipement_cheval;
    }

    public function setEquipementCheval(?string $equipement_cheval): self
    {
        $this->equipement_cheval = $equipement_cheval;

        return $this;
    }

    public function getSoins(): ?string
    {
        return $this->soins;
    }

    public function setSoins(?string $soins): self
    {
        $this->soins = $soins;

        return $this;
    }
}
