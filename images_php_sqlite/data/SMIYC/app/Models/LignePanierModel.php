<?php

namespace App\Models;

use App\Entities\LignePanierEntity;
use CodeIgniter\Model;

class LignePanierModel extends Model
{
    protected $table            = 'ligne_panier';
    protected $primaryKey       = 'id_ligne_panier';
    protected $useAutoIncrement = true;
    protected $returnType       =   LignePanierEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_ligne_panier',
        'id_produit',
        'id_panier',
        'id_user',
        'quantite'
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

    public function getByUser(int $idUser)
{
    return $this->where('id_user', $idUser)->findAll();
}


}
