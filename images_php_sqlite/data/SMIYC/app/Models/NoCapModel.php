<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\NoCapEntity;

class NoCapModel extends Model
{
    protected $table = 'nocap';
    protected $primaryKey = 'id';

    // Autorise l'insertion de ces colonnes via le Seeder
    protected $allowedFields = ['image_name', 'title', 'order'];

    protected $returnType = NoCapEntity::class;
    protected $useTimestamps = false;
}