<?php

namespace App\Models;

use App\Entities\ProduitEntity;
use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produit';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = ProduitEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id',
        'name',
        'price',
        'description',
        'notation',
        'taille',
        'quantiteRestante',
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

    /**
     * Renvoie  la 
     */
    public function getDisponibles(): array
    {
        return $this->where('quantiteRestante >', 0)->findAll();
    }
    public function getByName(String $name){
        return $this->like('name', $name)->findAll();
    }
}
