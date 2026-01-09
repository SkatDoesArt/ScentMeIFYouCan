<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;
use App\Entities\Panier\LigneCommandeEntity;
use App\Entities\Enums\StatutCommande;

/**
 * Représente une commande
 */
class CommandeEntity extends Entity
{
    protected int $idCommande;
    protected \DateTime $date;
    protected StatutCommande $statut;
    protected array $lignesCommande = [];

    public function __construct(int $idCommande)
    {
        $this->idCommande = $idCommande;
        $this->date = new \DateTime();
        $this->statut = StatutCommande::Brouillon;
        $this->lignesCommande = [];
    }

    public function getIdCommande(): int
    {
        return $this->idCommande;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getStatut(): StatutCommande
    {
        return $this->statut;
    }

    public function setStatut(StatutCommande $statut): void
    {
        $this->statut = $statut;
    }

    public function addLigne(LigneCommandeEntity $ligne): void
    {
        $this->lignesCommande[] = $ligne;
    }

    public function getLignesCommande(): array
    {
        return $this->lignesCommande;
    }

    public function getTotal(): float
    {
        $total = 0.0;
        foreach ($this->lignesCommande as $ligne) {
            $total += $ligne->getPrixUnitaire() * $ligne->getQuantite();
        }
        return $total;
    }
}
