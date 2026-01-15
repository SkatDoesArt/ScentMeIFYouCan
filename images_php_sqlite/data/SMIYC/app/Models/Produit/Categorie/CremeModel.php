<?php

namespace App\Models\Produit\Categorie;

use CodeIgniter\Model;
use App\Entities\CremeEntity;

class CremeModel extends Model
{
    protected $table      = 'produit';
    protected $primaryKey = 'id_produit';
    protected $returnType = CremeEntity::class;

    protected $allowedFields = [
        'image_name', 
        'name', 
        'description', 
        'price', 
        'notation', 
        'taille', 
        'quantiteRestante', 
        'marque',
        'typePeau',
        'type',
        'saison',
    ];

    protected $useTimestamps = false;

    /**
     * Récupère les produits de type "crème".
     *
     * @return array Tableau de produits crème
     */
    public function getCremes(): array
    {
        return $this->where('type', 'creme')->findAll();
    }

}