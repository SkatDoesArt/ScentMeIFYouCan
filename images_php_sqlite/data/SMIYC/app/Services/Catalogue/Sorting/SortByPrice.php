<?php

namespace App\Services\Catalogue\Sorting;

use App\Entities\ProduitEntity;

/**
 * Tri des produits par prix croissant
 */
class SortByPrice implements CatalogSortStrategy
{
    public function sort(array $produits): array
    {
        usort($produits, fn(ProduitEntity $a, ProduitEntity $b) => $a->getPrix() <=> $b->getPrix());
        return $produits;
    }
}
