<?php

namespace App\Services\Commande\Validation;

use App\Entities\Panier\CommandeEntity;

/**
 * Vérifie que l'adresse de livraison est valide
 */
class AddressValidationHandler extends ValidationHandler
{
    protected function process(CommandeEntity $commande): bool
    {
        // Vérifier l'adresse de livraison
        // Pour l'instant on retourne true par défaut
        return true;
    }
}
