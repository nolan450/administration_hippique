<?php

namespace App\Entity;

use App\Repository\AttributsPhysiquesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributsPhysiquesRepository::class)]
class AttributsPhysiques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $resistance = null;

    #[ORM\Column]
    private ?int $endurance = null;

    #[ORM\Column]
    private ?int $detente = null;

    #[ORM\Column]
    private ?int $vitesse = null;

    #[ORM\OneToOne(inversedBy: 'attributsPhysiques', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?cheval $id_cheval = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResistance(): ?int
    {
        return $this->resistance;
    }

    public function setResistance(int $resistance): self
    {
        $this->resistance = $resistance;

        return $this;
    }

    public function getEndurance(): ?int
    {
        return $this->endurance;
    }

    public function setEndurance(int $endurance): self
    {
        $this->endurance = $endurance;

        return $this;
    }

    public function getDetente(): ?int
    {
        return $this->detente;
    }

    public function setDetente(int $detente): self
    {
        $this->detente = $detente;

        return $this;
    }

    public function getVitesse(): ?int
    {
        return $this->vitesse;
    }

    public function setVitesse(int $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getIdCheval(): ?cheval
    {
        return $this->id_cheval;
    }

    public function setIdCheval(cheval $id_cheval): self
    {
        $this->id_cheval = $id_cheval;

        return $this;
    }
}
