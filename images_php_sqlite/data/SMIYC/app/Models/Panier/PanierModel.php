<?php

namespace App\Models\Panier;

use App\Entities\Panier\PanierEntity;
use App\Models\Produit\ProduitModel;
use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'panier';
    protected $primaryKey = 'id_panier';
    protected $returnType = PanierEntity::class;
    protected $allowedFields = [
        'id_user'
    ];
    protected bool $updateOnlyChanged = true;

    /**
     * Ajoute un produit à un panier (crée la ligne ou incrémente la quantité)
     */
    public function addProduit(int $id_panier, int $id_produit, int $quantite = 1): bool
    {
        $ligne = $this->where('id_panier', $id_panier)
            ->where('id_produit', $id_produit)
            ->first();

        if ($ligne !== null) {
            return $this->update(
                $ligne->id_ligne_panier,
                [
                    'quantite' => $ligne->quantite + $quantite
                ]
            );
        }

        return (bool)$this->insert([
            'id_panier' => $id_panier,
            'id_produit' => $id_produit,
            'quantite' => $quantite,
        ]);
    }

    /**
     * Supprime une ligne produit d'un panier.
     *
     * @param int $id_panier Identifiant du panier
     * @param int $id_produit Identifiant du produit
     * @return mixed Résultat de l'opération de suppression
     */
    public function RemoveProduit(int $id_panier, int $id_produit)
    {
        return $this->where('id_panier', $id_panier)
            ->where('id_produit', $id_produit)
            ->delete();
    }

    /**
     * Vide le panier d'un utilisateur (supprime toutes ses lignes in `ligne_panier`).
     *
     * NOTE: Cette méthode prend uniquement l'identifiant utilisateur (id_user).
     * Elle ne supprime pas l'enregistrement `panier` lui‑même, elle supprime
     * seulement les lignes associées (comportement attendu pour vider un panier).
     *
     * @param int $userId Identifiant de l'utilisateur
     * @return bool true si des lignes ont été supprimées, false sinon
     */
    public function ClearPanier(int $userId): bool
    {
        $ligneModel = new LignePanierModel();

        // Trouver le panier associé à l'utilisateur
        $panier = $this->where('id_user', $userId)->first();
        if ($panier === null) {
            return false; // pas de panier => rien à vider
        }

        $panierId = $panier->id_panier;

        // Supprimer toutes les lignes du panier
        $ligneModel->where('id_panier', $panierId)->delete();

        return true;
    }


    public function getPanierComplet(int $id_panier): array
    {
        $lignePanierModel = new LignePanierModel();

        return $lignePanierModel
            ->select('ligne_panier.*, produit.name, produit.price')
            ->join('produit', 'produit.id_produit = ligne_panier.id_produit')
            ->where('ligne_panier.id_panier', $id_panier)
            ->findAll(); // ici, findAll() va renvoyer des objets LignePanierEntity
    }

    /**
     * Récupère toutes les lignes d'un panier avec les informations des produits.
     *
     * @param int $id_panier Identifiant du panier
     * @return array Liste des lignes du panier enrichies des informations produit
     */
    // Dans PanierModel ou dans LignePanierModel
    /**
     * Récupère le panier complet (lignes + total) d'un utilisateur.
     *
     * @param int $idUser Identifiant de l'utilisateur
     * @return array Tableau [items => array, total => float]
     */
    public function getPanierCompletByUser(int $idUser): array
    {
        $panierId = $this->getOrCreatePanier($idUser);

        $ligneModel = new LignePanierModel();
        $produitModel = new ProduitModel();

        $lignes = $ligneModel->where('id_panier', $panierId)->findAll();

        $items = [];
        $total = 0;

        foreach ($lignes as $ligne) {
            $produit = $produitModel->find($ligne['id_produit']);

            if (!$produit) continue;

            $totalLigne = $produit->price * $ligne['quantite'];
            $total += $totalLigne;

            $items[] = [
                'id_ligne_panier' => $ligne['id_ligne_panier'],
                'produit' => $produit,
                'quantite' => $ligne['quantite'],
                'total_ligne' => $totalLigne
            ];
        }

        return [$items, $total];
    }

    /**
     * Récupère l'ID du panier d'un utilisateur ou crée un panier s'il n'existe pas.
     *
     * @param int $id_user Identifiant de l'utilisateur
     * @return int Identifiant du panier
     */
    public function getOrCreatePanier(int $id_user): int
    {
        $panier = $this->where('id_user', $id_user)->first();

        if ($panier !== null) {
            return $panier->id_panier;
            // ou mieux :
            // return $panier->getIdPanier();
        }

        return $this->insert([
            'id_user' => $id_user
        ]);
    }


}
