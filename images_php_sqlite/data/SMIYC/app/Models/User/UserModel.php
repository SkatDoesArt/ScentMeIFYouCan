<?php

namespace App\Models\User;

enum Role: string {
    case Admin = 'admin';
    case Client = 'client';
}

enum MoyenPaiement: string {
    case Carte = 'carte';
    case PayPal = 'paypal';
}

class User {

    protected int $idUser;
    protected string $nom;
    protected string $prenom;
    protected string $login;
    protected string $mdp;
    protected Role $role;

    public function __construct(
        int $idUser,
        string $nom,
        string $prenom,
        string $login,
        string $mdp,
        Role $role
    ) {
        $this->idUser = $idUser;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
    }

    // --- Getters
    public function getIdUser(): int { return $this->idUser; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getLogin(): string { return $this->login; }
    public function getMdp():string{return $this->mdp;}
    public function getRole(): string { return $this->role->value; }
}

class Client extends User {

    private array $adresses;             
    private array $moyensPaiement;       

    public function __construct(
        int $idUser,
        string $nom,
        string $prenom,
        string $login,
        string $mdp,
        array $adresses,                 
        array $moyensPaiement            
    ) {
        parent::__construct($idUser, $nom, $prenom, $login, $mdp, Role::Client);

        $this->adresses = $adresses;
        $this->moyensPaiement = $moyensPaiement;
    }

    public function getAdresses(): array {
        return $this->adresses;
    }

    public function getMoyensPaiement(): array {
        return $this->moyensPaiement;
    }


}



class Admin extends User {

    public function __construct(
        int $idUser,
        string $nom,
        string $prenom,
        string $login,
        string $mdp
    ) {
        parent::__construct($idUser, $nom, $prenom, $login, $mdp, Role::Admin);
    }
}

?>
