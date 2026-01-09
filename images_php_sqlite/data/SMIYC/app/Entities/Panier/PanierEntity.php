<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;

/**
 * Représente un panier de l'utilisateur
 */
class PanierEntity extends Entity
{
    protected int $idPanier;
    protected array $lignesPanier = [];

    public function __construct(int $idPanier)
    {
        $this->idPanier = $idPanier;
        $this->lignesPanier = [];
    }

    public function getIdPanier(): int
    {
        return $this->idPanier;
    }

    public function getLignesPanier(): array
    {
        return $this->lignesPanier;
    }

    public function addLigne(LignePanierEntity $ligne): void
    {
        $this->lignesPanier[] = $ligne;
    }

    public function removeLigne(int $index): void
    {
        unset($this->lignesPanier[$index]);
        $this->lignesPanier = array_values($this->lignesPanier);
    }

    public function getTotal(): float
    {
        $total = 0.0;
        foreach ($this->lignesPanier as $ligne) {
            $total += $ligne->getPrixUnitaire() * $ligne->getQuantite();
        }
        return $total;
    }
}
