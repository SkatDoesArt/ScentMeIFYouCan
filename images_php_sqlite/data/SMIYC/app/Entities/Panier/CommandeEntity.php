<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;
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

    /**
     * Définit le statut de la commande.
     *
     * @param string $statut
     * @return void
     */
    public function setStatut(string $statut): void
    {
        $this->attributes['statut'] = $statut;
    }

    public function getUserID()
    {
        return $this->attributes['user_id'];
    }

    public function getDate()
    {
        return $this->attributes['date_commande'];
    }

    /**
     * Récupère les lignes de commande attachées à cette commande.
     *
     * @return LigneCommandeEntity[] Tableau d'objets LigneCommandeEntity
     */
    public function getLignesCommande(): array
    {
        return $this->lignesCommande;
    }

    /**
     * Définit les lignes de commande pour cette entité.
     * Attends un tableau d'objets LigneCommandeEntity.
     *
     * @param LigneCommandeEntity[] $lignes
     * @return void
     */
    public function setLignesCommande(array $lignes): void
    {
        $this->lignesCommande = $lignes;
    }

    /**
     * Définit les informations de livraison (array with keys nom_complet, adresse, tel, ville, code_postal, pays)
     *
     * @param array $livraison
     * @return void
     */
    public function setLivraison(array $livraison): void
    {
        $this->attributes['livraison'] = $livraison;
    }

    /**
     * Retourne les informations de livraison si présentes.
     *
     * @return array|null
     */
    public function getLivraison(): ?array
    {
        return $this->attributes['livraison'] ?? null;
    }

    /**
     * Définit l'identifiant utilisateur associé à la commande.
     *
     * @param int $userId
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    /**
     * Définit la date de la commande.
     *
     * @param string|DateTime $date
     * @return void
     */
    public function setDateCommande($date): void
    {
        if ($date instanceof DateTime) {
            $this->attributes['date_commande'] = $date->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_commande'] = (string)$date;
        }
    }
}
