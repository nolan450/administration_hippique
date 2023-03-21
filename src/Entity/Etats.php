<?php

namespace App\Entity;

use App\Repository\EtatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatsRepository::class)]
class Etats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $sante = null;

    #[ORM\Column]
    private ?int $moral = null;

    #[ORM\Column]
    private ?int $stress = null;

    #[ORM\Column]
    private ?int $fatigue = null;

    #[ORM\Column]
    private ?int $faim = null;

    #[ORM\Column]
    private ?int $proprete = null;

    #[ORM\OneToOne(inversedBy: 'etats', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?cheval $id_cheval = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSante(): ?int
    {
        return $this->sante;
    }

    public function setSante(int $sante): self
    {
        $this->sante = $sante;

        return $this;
    }

    public function getMoral(): ?int
    {
        return $this->moral;
    }

    public function setMoral(int $moral): self
    {
        $this->moral = $moral;

        return $this;
    }

    public function getStress(): ?int
    {
        return $this->stress;
    }

    public function setStress(int $stress): self
    {
        $this->stress = $stress;

        return $this;
    }

    public function getFatigue(): ?int
    {
        return $this->fatigue;
    }

    public function setFatigue(int $fatigue): self
    {
        $this->fatigue = $fatigue;

        return $this;
    }

    public function getFaim(): ?int
    {
        return $this->faim;
    }

    public function setFaim(int $faim): self
    {
        $this->faim = $faim;

        return $this;
    }

    public function getProprete(): ?int
    {
        return $this->proprete;
    }

    public function setProprete(int $proprete): self
    {
        $this->proprete = $proprete;

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
