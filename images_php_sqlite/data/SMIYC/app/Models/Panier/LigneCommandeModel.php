<?php

namespace App\Models\Panier;

use CodeIgniter\Model;

class LigneCommandeModel extends Model
{
    protected $table = 'ligne_commandes';
    protected $primaryKey = 'id_ligne_commande';
    protected $allowedFields = [
        'commande_id',
        'produit_id',
        'produit_name',
        'quantite',
        'prix_unitaire',
        'total_ligne',
        'created_at'
    ];
    protected $useTimestamps = false;
}
