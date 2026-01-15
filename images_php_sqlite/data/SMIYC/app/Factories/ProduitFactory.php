<?php

namespace App\Factories;

use App\Entities\ProduitEntity;
use App\Entities\Parfum;
use App\Entities\Encens;
use App\Entities\Creme;
use InvalidArgumentException;

/**
 * Factory pour créer des objets Produit
 */
class ProduitFactory
{
    /**
     * Crée un produit selon le type et les données fournies
     *
     * @param string $type 'Parfum', 'Encens' ou 'Creme'
     * @param array $data Tableau des données pour l'entité
     * @return ProduitEntity
     */
    public static function build(string $type, array $data): ProduitEntity
    {
        return match($type) {
            'Parfum' => new Parfum($data),
            'Encens' => new Encens($data),
            'Creme' => new Creme($data),
            default => throw new InvalidArgumentException("Type de produit inconnu : $type"),
        };
    }
}


/*
 * <?php

namespace App\Factories;

use App\Entities\Parfum;
use App\Entities\Encens;
use App\Entities\Creme;
use App\Entities\AProduitEntity;

class ProduitFactory
{
    *
     * Construit une instance d'entité produit à partir d'un tableau de données.
     *
     * @param string $categorie
     * @param array $data
     * @return AProduitEntity

public static function build(string $categorie, array $data): AProduitEntity
{
    // Normaliser la catégorie
    $cat = strtolower(trim($categorie));

    switch ($cat) {
        case 'parfum':
        case 'parfums':
            return new Parfum($data);
        case 'encens':
            return new Encens($data);
        case 'creme':
        case 'crème':
            return new Creme($data);
        default:
            // Par défaut on utilise Parfum pour éviter erreur fatale
            return new Parfum($data);
    }
}
}

*/
