<?php

namespace App\Entities\Users;

use CodeIgniter\Entity\Entity;

/**
 * Représente un client de la plateforme
 * Hérite d'Acheteur et peut étendre des fonctionnalités spécifiques au client
 */
class Client extends Acheteur
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * Retourne une version formatée du profil pour affichage public
     */
    public function getProfilPublic(): string
    {
        return sprintf(
            "Client: %s, Email: %s",
            $this->getIdentite(),
            $this->getEmail()
        );
    }

    /**
     * Permet de mettre à jour le mot de passe du client
     *
     * @param string $nouveauMotDePasse
     */
    public function changerMotDePasse(string $nouveauMotDePasse): void
    {
        $this->setUser($this->getUser()); // s'assurer que user est lié
        $this->getUser()->setPasswordHash(password_hash($nouveauMotDePasse, PASSWORD_DEFAULT));
    }
}
