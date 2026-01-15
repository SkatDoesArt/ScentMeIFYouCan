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
        $livraison = $commande->getLivraison();

        // Si aucune info de livraison, échoue
        if (empty($livraison) || !is_array($livraison)) {
            return false;
        }

        $required = ['nom_complet', 'adresse', 'tel', 'ville', 'code_postal', 'pays'];

        foreach ($required as $key) {
            if (empty($livraison[$key]) || trim((string)$livraison[$key]) === '') {
                return false;
            }
        }

        if (strlen(trim((string)$livraison['code_postal'])) < 5) {
            return false;
        }

        return true;
    }
}
