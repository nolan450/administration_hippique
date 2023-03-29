<?php

namespace App\Entity;

use App\Repository\ClubHippiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubHippiqueRepository::class)]
class ClubHippique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_club_hippique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $capacite_accueil = null;

    #[ORM\ManyToMany(targetEntity: Joueur::class, inversedBy: 'clubHippiques')]
    private Collection $id_joueur;

    #[ORM\OneToMany(mappedBy: 'id_club_hippique', targetEntity: Infrastructure::class)]
    private Collection $famille_infrastructure;

    public function __construct()
    {
        $this->id_joueur = new ArrayCollection();
        $this->famille_infrastructure = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapaciteAccueil(): ?string
    {
        return $this->capacite_accueil;
    }

    public function setCapaciteAccueil(?string $capacite_accueil): self
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
        }

        return $this;
    }

    public function removeIdJoueur(Joueur $idJoueur): self
    {
        $this->id_joueur->removeElement($idJoueur);

        return $this;
    }

    /**
     * @return Collection<int, Infrastructure>
     */
    public function getFamilleInfrastructure(): Collection
    {
        return $this->famille_infrastructure;
    }

    public function addFamilleInfrastructure(Infrastructure $familleInfrastructure): self
    {
        if (!$this->famille_infrastructure->contains($familleInfrastructure)) {
            $this->famille_infrastructure->add($familleInfrastructure);
            $familleInfrastructure->setIdClubHippique($this);
        }

        return $this;
    }

    public function removeFamilleInfrastructure(Infrastructure $familleInfrastructure): self
    {
        if ($this->famille_infrastructure->removeElement($familleInfrastructure)) {
            // set the owning side to null (unless already changed)
            if ($familleInfrastructure->getIdClubHippique() === $this) {
                $familleInfrastructure->setIdClubHippique(null);
            }
        }

        return $this;
    }

}
