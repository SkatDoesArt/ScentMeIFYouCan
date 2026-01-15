<?php

namespace App\Models\Panier;

use App\Entities\Panier\LignePanierEntity;
use CodeIgniter\Model;
use App\Models\Produit\ProduitModel;

class LignePanierModel extends Model
{
    protected $table = 'ligne_panier';
    protected $primaryKey = 'id_ligne_panier';
    protected $allowedFields = [
        'id_produit',
        'id_panier',
        'quantite',
        'prix_unitaire'
    ];



    /**
     * Ajoute un produit à une ligne de panier (ou incrémente la quantité si la ligne existe).
     *
     * @param int $id_panier Identifiant du panier
     * @param int $id_produit Identifiant du produit
     * @param int $quantite Quantité à ajouter (par défaut 1)
     * @return bool true si l'opération a réussi, false sinon
     */
    public function addProduit(int $id_panier, int $id_produit, int $quantite = 1): bool
    {
        // Validation défensive : id_produit doit être positif
        if ($id_produit <= 0) {
            return false;
        }

        // Vérifier que le produit existe
        $produitModel = new ProduitModel();
        $produit = $produitModel->find($id_produit);
        if (!$produit) {
            return false; // produit invalide → ne pas insérer
        }

        $ligne = $this->where('id_panier', $id_panier)
            ->where('id_produit', $id_produit)
            ->first();

        if ($ligne !== null) {
            return (bool)$this->set(
                'quantite',
                "quantite + {$quantite}",
                false
            )
                ->where('id_ligne_panier', $ligne['id_ligne_panier'])
                ->update();
        }

        return (bool)$this->insert([
            'id_panier' => $id_panier,
            'id_produit' => $id_produit,
            'quantite' => $quantite,
            'prix_unitaire' => 0 // Valeur par défaut, à mettre à jour plus tard
        ]);
    }

    // --------------------------------------------
    // Augmente la quantité d'une ligne
    // --------------------------------------------
    /**
     * Augmente la quantité d'une ligne de panier.
     *
     * @param int $id_ligne_panier Identifiant de la ligne
     * @param int $amount Montant à ajouter (par défaut 1)
     * @return bool true si l'opération a réussi
     */
    public function incrementQuantite(int $id_ligne_panier, int $amount = 1): bool
    {
        return (bool)$this->set(
            'quantite',
            "quantite + {$amount}",
            false
        )
            ->where('id_ligne_panier', $id_ligne_panier)
            ->update();
    }


    // --------------------------------------------
    // Diminue la quantité d'une ligne
    // --------------------------------------------
    /**
     * Diminue la quantité d'une ligne de panier (garantit que la quantité ne devient pas négative).
     *
     * @param int $id_ligne_panier Identifiant de la ligne
     * @param int $amount Montant à soustraire (par défaut 1)
     * @return bool true si l'opération a réussi
     */
    public function decrementQuantite(int $id_ligne_panier, int $amount = 1): bool
    {
        return (bool)$this->set(
            'quantite',
            "CASE 
            WHEN quantite - {$amount} < 0 THEN 0 
            ELSE quantite - {$amount} 
            END",
            false
        )
            ->where('id_ligne_panier', $id_ligne_panier)
            ->update();
    }


    // --------------------------------------------
    // Supprime une ligne du panier
    // --------------------------------------------
    /**
     * Supprime une ligne du panier.
     *
     * @param int $id_ligne_panier Identifiant de la ligne
     * @return void
     */
    public function deleteLigne(int $id_ligne_panier)
    {
        $this->delete($id_ligne_panier);
    }

}
