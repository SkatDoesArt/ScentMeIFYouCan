<?php

namespace App\Entities\Users;

use CodeIgniter\Entity\Entity;

/**
 * Représente un utilisateur du système (Client ou Admin)
 */
class User extends Entity
{
    protected ?int $idUser = null;
    protected string $email;
    protected string $login;
    protected string $passwordHash;
    protected bool $actif = true;
    protected string $role;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'Admin';
    }

    public function isClient(): bool
    {
        return $this->role === 'Client';
    }

    // Getters / Setters
    public function getIdUser(): ?int { return $this->idUser; }
    public function setIdUser(int $id) { $this->idUser = $id; }

    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email) { $this->email = $email; }

    public function getLogin(): string { return $this->login; }
    public function setLogin(string $login) { $this->login = $login; }

    public function getPasswordHash(): string { return $this->passwordHash; }
    public function setPasswordHash(string $hash) { $this->passwordHash = $hash; }

    public function isActif(): bool { return $this->actif; }
    public function setActif(bool $actif) { $this->actif = $actif; }

    public function getRole(): string { return $this->role; }
    public function setRole(string $role) { $this->role = $role; }
}
