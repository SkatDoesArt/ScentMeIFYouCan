<?php

namespace App\Services\Commande;

use App\Services\Commande\Validation\ValidationHandler;
use App\Entities\Panier\CommandeEntity;

/**
 * Orchestration de la validation des commandes via Chain of Responsibility
 */
class CommandeValidator
{
    protected ?ValidationHandler $firstHandler = null;

    /**
     * Définit le premier handler de la chaîne
     *
     * @param ValidationHandler $handler
     */
    public function setFirstHandler(ValidationHandler $handler): void
    {
        $this->firstHandler = $handler;
    }

    /**
     * Valide la commande en passant par tous les handlers
     *
     * @param CommandeEntity $commande
     * @return bool
     */
    public function validate(CommandeEntity $commande): bool
    {
        if ($this->firstHandler === null) {
            throw new \LogicException("Aucun handler défini pour la validation.");
        }

        return $this->firstHandler->handle($commande);
    }
}
