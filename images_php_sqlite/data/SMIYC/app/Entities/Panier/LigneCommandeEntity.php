<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;
use App\Entities\ProduitEntity;

/**
 * Représente une ligne d'une commande
 */
class LigneCommandeEntity extends Entity
{
    protected int $quantite;
    protected float $prixUnitaire;
    protected ProduitEntity $produit;

    public function __construct(ProduitEntity $produit, int $quantite = 1)
    {
        $this->produit = $produit;
        $this->quantite = $quantite;
        $this->prixUnitaire = $produit->getPrix();
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getPrixUnitaire(): float
    {
        return $this->prixUnitaire;
    }

    public function getProduit(): ProduitEntity
    {
        return $this->produit;
    }
}
