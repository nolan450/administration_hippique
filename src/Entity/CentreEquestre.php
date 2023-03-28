<?php

namespace App\Entity;

use App\Repository\CentreEquestreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentreEquestreRepository::class)]
class CentreEquestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_centre_equestre = null;

    #[ORM\Column]
    private ?int $capacite_accueil = null;

    #[ORM\OneToMany(mappedBy: 'centreEquestre', targetEntity: Joueur::class)]
    private Collection $id_joueur;

    #[ORM\OneToMany(mappedBy: 'id_centre_equestre', targetEntity: TacheAutomatique::class)]
    private Collection $tacheAutomatiques;

    public function __construct()
    {
        $this->id_joueur = new ArrayCollection();
        $this->tacheAutomatiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCentreEquestre(): ?int
    {
        return $this->id_centre_equestre;
    }

    public function setIdCentreEquestre(int $id_centre_equestre): self
    {
        $this->id_centre_equestre = $id_centre_equestre;

        return $this;
    }

    public function getCapaciteAccueil(): ?int
    {
        return $this->capacite_accueil;
    }

    public function setCapaciteAccueil(int $capacite_accueil): self
    {
        $this->capacite_accueil = $capacite_accueil;

        return $this;
    }

    /**
     * @return Collection<int, Joueur>
     */
    public function getIdJoueur(): Collection
    {
        return $this->id_joueur;
    }

    public function addIdJoueur(Joueur $idJoueur): self
    {
        if (!$this->id_joueur->contains($idJoueur)) {
            $this->id_joueur->add($idJoueur);
            $idJoueur->setCentreEquestre($this);
        }

        return $this;
    }

    public function removeIdJoueur(Joueur $idJoueur): self
    {
        if ($this->id_joueur->removeElement($idJoueur)) {
            // set the owning side to null (unless already changed)
            if ($idJoueur->getCentreEquestre() === $this) {
                $idJoueur->setCentreEquestre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TacheAutomatique>
     */
    public function getTacheAutomatiques(): Collection
    {
        return $this->tacheAutomatiques;
    }

    public function addTacheAutomatique(TacheAutomatique $tacheAutomatique): self
    {
        if (!$this->tacheAutomatiques->contains($tacheAutomatique)) {
            $this->tacheAutomatiques->add($tacheAutomatique);
            $tacheAutomatique->setIdCentreEquestre($this);
        }

        return $this;
    }

    public function removeTacheAutomatique(TacheAutomatique $tacheAutomatique): self
    {
        if ($this->tacheAutomatiques->removeElement($tacheAutomatique)) {
            // set the owning side to null (unless already changed)
            if ($tacheAutomatique->getIdCentreEquestre() === $this) {
                $tacheAutomatique->setIdCentreEquestre(null);
            }
        }

        return $this;
    }
}
