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
    protected $allowedFields    = [
        'id_ligne_panier',
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

    // --------------------------------------------
    // Augmente la quantité d'une ligne
    // --------------------------------------------
    public function incrementQuantite(int $id_ligne_panier, int $amount = 1)
    {
        $ligne = $this->find($id_ligne_panier);
        if ($ligne) {
            $this->update($id_ligne_panier, [
                'quantite' => $ligne->quantite + $amount
            ]);
        }
    }

    // --------------------------------------------
    // Diminue la quantité d'une ligne
    // --------------------------------------------
    public function decrementQuantite(int $id_ligne_panier, int $amount = 1)
    {
        $ligne = $this->find($id_ligne_panier);
        if ($ligne) {
            $nouvelleQuantite = max(0, $ligne->quantite - $amount); // jamais négatif
            $this->update($id_ligne_panier, [
                'quantite' => $nouvelleQuantite
            ]);
        }
    }

    // --------------------------------------------
    // Supprime une ligne du panier
    // --------------------------------------------
    public function deleteLigne(int $id_ligne_panier)
    {
        $this->delete($id_ligne_panier);
    }

}
