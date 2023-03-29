<?php

namespace App\Entity;

use App\Repository\TacheAutomatiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheAutomatiqueRepository::class)]
class TacheAutomatique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_action = null;

    #[ORM\Column]
    private ?int $frequence_realisation = null;

    #[ORM\ManyToOne(inversedBy: 'tacheAutomatiques')]
    private ?CentreEquestre $id_centre_equestre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAction(): ?string
    {
        return $this->nom_action;
    }

    public function setNomAction(string $nom_action): self
    {
        $this->nom_action = $nom_action;

        return $this;
    }

    public function getFrequenceRealisation(): ?int
    {
        return $this->frequence_realisation;
    }

    public function setFrequenceRealisation(int $frequence_realisation): self
    {
        $this->frequence_realisation = $frequence_realisation;

        return $this;
    }

    public function getIdCentreEquestre(): ?CentreEquestre
    {
        return $this->id_centre_equestre;
    }

    public function setIdCentreEquestre(?CentreEquestre $id_centre_equestre): self
    {
        $this->id_centre_equestre = $id_centre_equestre;

        return $this;
    }
}
