<?php

namespace App\Services\Commande\Validation;

use App\Entities\Panier\CommandeEntity;

/**
 * Vérifie que les produits de la commande sont en stock
 */
class StockValidationHandler extends ValidationHandler
{
    protected function process(CommandeEntity $commande): bool
    {
        foreach ($commande->getLignesCommande() as $ligne) {
            if ($ligne->getQuantite() > $ligne->getProduit()->getQuantiteRestante()) {
                return false; // stock insuffisant
            }
        }
        return true;
    }
}
