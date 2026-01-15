<?php

namespace App\Services\Commande\Validation;

use App\Entities\Panier\CommandeEntity;

/**
 * ValidationHandler abstract used by concrete handlers.
 */
abstract class ValidationHandler
{
    protected ?ValidationHandler $next = null;

    public function setNext(ValidationHandler $handler): ValidationHandler
    {
        $this->next = $handler;
        return $handler;
    }

    public function handle(CommandeEntity $commande): bool
    {
        $result = $this->process($commande);

        if ($result && $this->next !== null) {
            return $this->next->handle($commande);
        }

        return $result;
    }

    abstract protected function process(CommandeEntity $commande): bool;
}

