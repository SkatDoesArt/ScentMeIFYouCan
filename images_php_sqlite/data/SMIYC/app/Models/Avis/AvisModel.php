<?php

namespace App\Models\Avis;

use App\Entities\AvisEntity;
use CodeIgniter\Model;

class AvisModel extends Model
{
    protected $table            = 'avis';
    protected $primaryKey       = 'id_avis';
    protected $useAutoIncrement = true;
    protected $returnType       = AvisEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_avis',
        'id_user',
        'id_produit',
        'titre',
        'contenu',
        'date',
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

    //Renvoie tous les utilisateurs qui ont laissé un avis sur un produit
    public function getAvisWithUsersByProduct($idProduit)
{
    return $this->select('avis.*, users.username, users.email')
                ->join('users', 'users.id = avis.id_user')
                ->where('avis.id_produit', $idProduit)
                ->findAll();
}
/**
 * Récupère tous les avis d'un produit donné
 */
public function getAvisByProduit(int $idProduit)
{
    return $this->where('id_produit', $idProduit)
                ->orderBy('date', 'DESC')  // optionnel : trier par date
                ->findAll();
}

}
