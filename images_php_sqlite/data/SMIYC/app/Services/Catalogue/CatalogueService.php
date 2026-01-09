<?php

namespace App\Services\Catalogue;

use App\Services\Catalogue\Sorting\CatalogSortStrategy;
use App\Entities\ProduitEntity;

/**
 * Service de gestion du catalogue de produits
 */
class CatalogueService
{
    /**
     * @var CatalogSortStrategy|null Stratégie actuelle de tri
     */
    private ?CatalogSortStrategy $strategy = null;

    /**
     * Définit la stratégie de tri
     *
     * @param CatalogSortStrategy $strategy
     */
    public function setStrategy(CatalogSortStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * Retourne le catalogue trié selon la stratégie actuelle
     *
     * @param ProduitEntity[] $produits
     * @return ProduitEntity[]
     */
    public function getCatalogue(array $produits): array
    {
        if ($this->strategy === null) {
            // Tri par défaut (par nom)
            usort($produits, fn(ProduitEntity $a, ProduitEntity $b) => strcmp($a->getNom(), $b->getNom()));
            return $produits;
        }

        return $this->strategy->sort($produits);
    }
}
