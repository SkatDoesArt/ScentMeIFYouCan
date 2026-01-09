<?php

namespace App\Services\Commande\Validation;

use App\Entities\Panier\CommandeEntity;

/**
 * Vérifie que le paiement est valide
 */
class PaymentValidationHandler extends ValidationHandler
{
    protected function process(CommandeEntity $commande): bool
    {
        // Simuler une vérification du paiement
        // Ex: vérifier le moyen de paiement, carte valide, solde suffisant, etc.
        return true;
    }
}
