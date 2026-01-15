<?php

namespace App\Models;

use App\Entities\Panier\CommandeEntity;
use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table            = 'commandes';
    protected $primaryKey       = 'id';
    protected $returnType       = CommandeEntity::class;
    protected $allowedFields    = [
        'id_user',
        'date_commande',
        'statut',
        'total_prix'
    ];
    protected bool $updateOnlyChanged = true;


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
