<?php

namespace App\Models;

use App\Entities\Panier\CommandeEntity;
use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table            = 'commandes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = CommandeEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'date_commande',
        'statut',
        'total_prix'
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


    public function createCommande(int $id_user, array $cart): CommandeEntity
    {
        $totalPrix = $cart[1];

        $commandeData = [
            'id_user' => $id_user,
            'date_commande' => date('Y-m-d H:i:s'),
            'statut' => 'En cours',
            'total_prix' => $totalPrix
        ];

        $this->insert($commandeData);
        $commandeId = $this->getInsertID();

        // Ici, vous pouvez également ajouter des lignes de commande si nécessaire

        return $this->find($commandeId);
    }
}
