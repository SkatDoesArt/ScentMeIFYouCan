<?php

namespace App\Models\Produit\Categorie;

use CodeIgniter\Model;
use App\Entities\MarquesEntity;

class MarquesModel extends Model
{
    protected $table      = 'marques';
    protected $primaryKey = 'id_marques';

    protected $allowedFields = [
        'title',
        'description',
        'image_name'
    ];

    protected $returnType     = MarquesEntity::class;
    protected $useTimestamps  = false;

    public function getMarques()
    {
        return $this->findAll();
    }
}