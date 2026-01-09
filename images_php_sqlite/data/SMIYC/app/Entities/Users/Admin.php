<?php

namespace App\Entities\Users;

use CodeIgniter\Entity\Entity;

/**
 * Représente un administrateur de la plateforme
 * Délègue certaines fonctions à un User
 */
class Admin extends Entity
{
    protected User $userDelegate;

    public function __construct(User $userDelegate)
    {
        $this->userDelegate = $userDelegate;
    }

    public function gererProduits(): void
    {
        // Logique pour gérer les produits
    }

    public function gererCommandes(): void
    {
        // Logique pour gérer les commandes
    }

    public function gererUtilisateurs(): void
    {
        // Logique pour gérer les utilisateurs
    }

    public function getUserDelegate(): User
    {
        return $this->userDelegate;
    }

    public function setUserDelegate(User $user): void
    {
        $this->userDelegate = $user;
    }
}
