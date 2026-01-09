<?php

namespace App\Services\Catalogue\Sorting;

use App\Entities\ProduitEntity;

/**
 * Tri des produits par notation décroissante
 */
class SortByRating implements CatalogSortStrategy
{
    public function sort(array $produits): array
    {
        usort($produits, fn(ProduitEntity $a, ProduitEntity $b) => $b->getNotationProduit() <=> $a->getNotationProduit());
        return $produits;
    }
}
