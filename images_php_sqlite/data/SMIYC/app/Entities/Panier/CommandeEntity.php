<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;
use App\Entities\Panier\LigneCommandeEntity;
use DateTime;

class CommandeEntity extends Entity
{
    protected int $id_commande;
    protected DateTime $date_commande;
    protected string $statut;
    protected array $lignesCommande = [];

    // Si tu veux initialiser par défaut
    public function init(array $data = [])
    {
        $this->date_commande = new DateTime();
        $this->statut = $data['statut'] ?? 'Brouillon';
        $this->lignesCommande = $data['lignesCommande'] ?? [];
    }
    public function getIdCommande()
    {
        return $this->attributes['id_commande'];
    }
        public function getStatut()
    {
        return $this->attributes['statut'];
    }
        public function getUserID()
    {
        return $this->attributes['user_id'];
    }
        public function getDate()
    {
        return $this->attributes['date_commande'];
    }

}
