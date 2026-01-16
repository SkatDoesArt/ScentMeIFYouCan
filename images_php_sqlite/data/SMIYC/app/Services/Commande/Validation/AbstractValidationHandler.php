<?php

namespace App\Services\Commande\Validation;

use App\Entities\Panier\CommandeEntity;

/**
 * Classe abstraite pour les handlers de validation de commande
 */
abstract class ValidationHandler
{
    protected ?ValidationHandler $next = null;

    /**
     * Définit le handler suivant dans la chaîne
     *
     * @param ValidationHandler $handler
     * @return ValidationHandler
     */
    public function setNext(ValidationHandler $handler): ValidationHandler
    {
        $this->next = $handler;
        return $handler;
    }

    /**
     * Traite la commande
     *
     * @param CommandeEntity $commande
     * @return bool
     */
    public function handle(CommandeEntity $commande): bool
    {
        $result = $this->process($commande);

        if ($result && $this->next !== null) {
            return $this->next->handle($commande);
        }

        return $result;
    }

    /**
     * Méthode spécifique au handler à implémenter dans les classes concrètes
     *
     * @param CommandeEntity $commande
     * @return bool
     */
    abstract protected function process(CommandeEntity $commande): bool;
}
