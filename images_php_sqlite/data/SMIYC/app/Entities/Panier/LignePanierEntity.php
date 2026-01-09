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
    protected ?ProduitEntity $produit = null;
    protected $attributes = [
        'quantite' => 1,
    ];

    public function associerProduit(ProduitEntity $produit, int $quantite = 1): self
    {
        $this->produit = $produit;
        $this->attributes['quantite'] = $quantite;
        $this->attributes['id_produit'] = $produit->id_produit;

        return $this;
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
