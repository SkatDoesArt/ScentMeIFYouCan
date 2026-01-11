<?php

namespace App\Models\Produit\Categorie;

use CodeIgniter\Model;
use App\Entities\NoCapEntity;

class MarquesModel extends Model
{
    // On pointe désormais vers la table collective
    protected $table = 'marques';

    // Ta migration utilise 'id_marques' comme clé primaire
    protected $primaryKey = 'id_marques';

    // Liste complète des colonnes pour autoriser les insertions via Seeder
    // Dans App/Models/MarquesModel.php
    protected $allowedFields = [
        'name',
        'description',
        'image_name'
        
    ];

    // On garde l'Entity pour pouvoir utiliser la méthode getUrl()
    protected $returnType = MarquesEntity::class;

    protected $useTimestamps = false;

    /**
     * Optionnel : Méthode pour ne récupérer que les marques
     */
    public function getMarques()
    {
        return $this->findAll();
    }
}