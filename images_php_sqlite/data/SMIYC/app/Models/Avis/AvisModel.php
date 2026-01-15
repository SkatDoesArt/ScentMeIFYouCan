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
