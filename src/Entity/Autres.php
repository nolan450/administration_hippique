<?php

namespace App\Entity;

use App\Repository\AutresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutresRepository::class)]
class Autres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $experience = null;

    #[ORM\Column]
    private ?int $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $etat_general = null;

    #[ORM\OneToOne(inversedBy: 'autres', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?cheval $id_cheval = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEtatGeneral(): ?string
    {
        return $this->etat_general;
    }

    public function setEtatGeneral(string $etat_general): self
    {
        $this->etat_general = $etat_general;

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
