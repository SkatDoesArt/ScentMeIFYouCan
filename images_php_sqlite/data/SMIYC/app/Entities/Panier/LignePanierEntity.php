<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;
use App\Entities\ProduitEntity;

/**
 * Représente une ligne du panier
 */
class LignePanierEntity extends Entity
{
    protected int $quantite;
    protected ProduitEntity $produit;

    public function __construct(ProduitEntity $produit, int $quantite = 1)
    {
        $this->produit = $produit;
        $this->quantite = $quantite;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getProduit(): ProduitEntity
    {
        return $this->produit;
    }

    public function getPrixUnitaire(): float
    {
        return $this->produit->getPrix();
    }
}
