<?php

namespace App\Models\Avis;

use App\Entities\AvisEntity;
use CodeIgniter\Model;

class AvisModel extends Model
{
    protected $table            = 'avis';
    protected $primaryKey       = 'id_avis';
    protected $returnType       = AvisEntity::class;
    protected $allowedFields    = [
        'id_avis',
        'id_user',
        'id_produit',
        'titre',
        'contenu',
        'date',
    ];
    protected bool $updateOnlyChanged = true;

    /**
     * Récupère tous les avis d'un produit avec les informations des utilisateurs.
     *
     * @param int $idProduit Identifiant du produit
     * @return array Tableau d'avis enrichis par les informations utilisateur
     */
    public function getAvisWithUsersByProduct(int $idProduit): array
    {
        return $this->select('avis.*, users.username, users.email')
                    ->join('users', 'users.id = avis.id_user')
                    ->where('avis.id_produit', $idProduit)
                    ->findAll();
    }

    /**
     * Récupère tous les avis d'un produit donné.
     *
     * @param int $idProduit Identifiant du produit
     * @return array Tableau d'avis
     */
    public function getAvisByProduit(int $idProduit): array
    {
        return $this->where('id_produit', $idProduit)
                    ->orderBy('date', 'DESC')  // optionnel : trier par date
                    ->findAll();
    }

}
