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


    /**
     * Crée une commande à partir des données du panier.
     *
     * @param int $id_user Identifiant de l'utilisateur
     * @param array $cart Tableau contenant les éléments et le total ([0 => items, 1 => total])
     * @return CommandeEntity L'entité commande créée
     */
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
