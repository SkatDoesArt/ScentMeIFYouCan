<?php

namespace App\Entities\Users;

use CodeIgniter\Entity\Entity;

/**
 * Représente un acheteur (Client authentifié ou Visiteur)
 */
class Acheteur extends Entity
{
    protected string $email;
    protected string $adresseLivraison;
    protected string $adresseFacturation;
    protected ?string $moyenPaiement = null;
    protected ?User $user = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function estAuthentifie(): bool
    {
        return $this->user !== null;
    }

    public function getIdentite(): string
    {
        if ($this->estAuthentifie()) {
            return $this->user->getLogin() . ' (' . $this->user->getEmail() . ')';
        }
        return $this->email;
    }

    // Getters / Setters
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email) { $this->email = $email; }

    public function getAdresseLivraison(): string { return $this->adresseLivraison; }
    public function setAdresseLivraison(string $adresse) { $this->adresseLivraison = $adresse; }

    public function getAdresseFacturation(): string { return $this->adresseFacturation; }
    public function setAdresseFacturation(string $adresse) { $this->adresseFacturation = $adresse; }

    public function getMoyenPaiement(): ?string { return $this->moyenPaiement; }
    public function setMoyenPaiement(string $moyen) { $this->moyenPaiement = $moyen; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(User $user) { $this->user = $user; }
}
