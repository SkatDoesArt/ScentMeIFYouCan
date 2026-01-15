<?php

namespace App\Models\Panier;

use App\Entities\Panier\LignePanierEntity;
use CodeIgniter\Model;

class LignePanierModel extends Model
{
    protected $table            = 'ligne_panier';
    protected $primaryKey       = 'id_ligne_panier';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_produit',
        'id_panier',
        'quantite',
        'prix_unitaire'
    ];


    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function addProduit(int $id_panier, int $id_produit, int $quantite = 1): bool
    {
        $ligne = $this->where('id_panier', $id_panier)
            ->where('id_produit', $id_produit)
            ->first();

        if ($ligne !== null) {
            return (bool) $this->set(
                'quantite',
                "quantite + {$quantite}",
                false
            )
                ->where('id_ligne_panier', $ligne['id_ligne_panier'])
                ->update();
        }

        return (bool) $this->insert([
            'id_panier'  => $id_panier,
            'id_produit' => $id_produit,
            'quantite'   => $quantite,
            'prix_unitaire' => 0 // Valeur par défaut, à mettre à jour plus tard
        ]);
    }

    // --------------------------------------------
    // Augmente la quantité d'une ligne
    // --------------------------------------------
    public function incrementQuantite(int $id_ligne_panier, int $amount = 1): bool
    {
        return (bool) $this->set(
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
    public function decrementQuantite(int $id_ligne_panier, int $amount = 1): bool
    {
        return (bool) $this->set(
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
    public function deleteLigne(int $id_ligne_panier)
    {
        $this->delete($id_ligne_panier);
    }

}
