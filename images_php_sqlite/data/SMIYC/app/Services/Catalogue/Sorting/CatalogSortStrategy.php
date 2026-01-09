<?php

namespace App\Services\Catalogue\Sorting;

use App\Entities\ProduitEntity;

/**
 * Interface Strategy pour le tri du catalogue
 */
interface CatalogSortStrategy
{
    /**
     * Trie une liste de produits selon la stratégie choisie
     *
     * @param ProduitEntity[] $produits
     * @return ProduitEntity[]
     */
    public function sort(array $produits): array;
}
