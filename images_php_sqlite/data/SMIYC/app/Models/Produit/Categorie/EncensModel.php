<?php

namespace App\Models\Produit\Categorie;

use CodeIgniter\Model;
use App\Entities\EncensEntity;

class EncensModel extends Model
{
    protected $table      = 'encens';
    protected $primaryKey = 'id_encens';

    // On indique au Model d'utiliser l'Entity pour les résultats
    protected $returnType = EncensEntity::class;

    // Tous les champs définis dans ta migration doivent être ici
    protected $allowedFields = [
        'image_name', 
        'name', 
        'description', 
        'price', 
        'niveauPrestige', 
        'notation', 
        'taille', 
        'quantiteRestante', 
        'marque',
        'origine',
        'dureeCombustion'
    ];

    protected $useTimestamps = false;

    public function getEncens()
    {
        return $this->findAll();
    }
}