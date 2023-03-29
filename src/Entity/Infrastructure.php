<?php

namespace App\Entity;

use App\Repository\InfrastructureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfrastructureRepository::class)]
class Infrastructure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $niveau = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'famille_infrastructure')]
    private ?ClubHippique $id_club_hippique = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?int $conso_ressources = null;

    #[ORM\Column]
    private ?int $capacite_accueil_chevaux = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $liste_items_infrastructure = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdClubHippique(): ?ClubHippique
    {
        return $this->id_club_hippique;
    }

    public function setIdClubHippique(?ClubHippique $id_club_hippique): self
    {
        $this->id_club_hippique = $id_club_hippique;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getConsoRessources(): ?int
    {
        return $this->conso_ressources;
    }

    public function setConsoRessources(int $conso_ressources): self
    {
        $this->conso_ressources = $conso_ressources;

        return $this;
    }

    public function getCapaciteAccueilChevaux(): ?int
    {
        return $this->capacite_accueil_chevaux;
    }

    public function setCapaciteAccueilChevaux(int $capacite_accueil_chevaux): self
    {
        $this->capacite_accueil_chevaux = $capacite_accueil_chevaux;

        return $this;
    }

    public function getListeItemsInfrastructure(): ?string
    {
        return $this->liste_items_infrastructure;
    }

    public function setListeItemsInfrastructure(?string $liste_items_infrastructure): self
    {
        $this->liste_items_infrastructure = $liste_items_infrastructure;

        return $this;
    }
}
