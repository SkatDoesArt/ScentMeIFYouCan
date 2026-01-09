<?php

namespace App\Services\Catalogue\Sorting;

use App\Entities\ProduitEntity;

/**
 * Tri des produits par prestige décroissant
 */
class SortByPrestige implements CatalogSortStrategy
{
    public function sort(array $produits): array
    {
        usort($produits, fn(ProduitEntity $a, ProduitEntity $b) => $b->getNiveauPrestige() <=> $a->getNiveauPrestige());
        return $produits;
    }
}
