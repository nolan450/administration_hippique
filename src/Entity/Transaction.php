<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CompteBancaire $id_compte_bancaire = null;

    #[ORM\Column]
    private ?int $montant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCompteBancaire(): ?CompteBancaire
    {
        return $this->id_compte_bancaire;
    }

    public function setIdCompteBancaire(?CompteBancaire $id_compte_bancaire): self
    {
        $this->id_compte_bancaire = $id_compte_bancaire;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
}
