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
        'type'
    ];

    protected $useTimestamps = false;

    public function getCremes()
    {
        return $this->findAll();
    }
}