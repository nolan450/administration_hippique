<?php

namespace App\Entity;

use App\Repository\AttributsMentauxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributsMentauxRepository::class)]
class AttributsMentaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $sociabilite = null;

    #[ORM\Column]
    private ?int $intelligence = null;

    #[ORM\Column]
    private ?int $temperament = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?cheval $id_cheval = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSociabilite(): ?int
    {
        return $this->sociabilite;
    }

    public function setSociabilite(int $sociabilite): self
    {
        $this->sociabilite = $sociabilite;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getTemperament(): ?int
    {
        return $this->temperament;
    }

    public function setTemperament(int $temperament): self
    {
        $this->temperament = $temperament;

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
