<?php

namespace App\Entities\Users;

use CodeIgniter\Entity\Entity;

/**
 * Représente une session d'achat, qui contient un Acheteur
 */
class SessionAchat extends Entity
{
    protected int $idSession;
    protected \DateTime $dateCreation;
    protected \DateTime $dateDerniereActivite;
    protected Acheteur $acheteur;

    public function __construct(Acheteur $acheteur)
    {
        $this->acheteur = $acheteur;
        $this->dateCreation = new \DateTime();
        $this->dateDerniereActivite = new \DateTime();
    }

    public function estActive(): bool
    {
        $now = new \DateTime();
        $interval = $now->getTimestamp() - $this->dateDerniereActivite->getTimestamp();
        return $interval < 3600; // active si moins de 1h depuis dernière activité
    }

    public function getAcheteur(): Acheteur
    {
        return $this->acheteur;
    }

    public function setAcheteur(Acheteur $acheteur): void
    {
        $this->acheteur = $acheteur;
    }

    public function refreshActivite(): void
    {
        $this->dateDerniereActivite = new \DateTime();
    }
}
