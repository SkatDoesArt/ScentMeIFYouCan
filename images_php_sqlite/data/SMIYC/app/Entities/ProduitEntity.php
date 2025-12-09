<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProduitEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = [];
    protected $casts   = [
        'id'               => 'int',
        'name'             => 'string',
        'price'            => 'float',
        'description'      => 'string',
        'notation'   => 'int',
        'taille'           => 'int',
        'quantiteRestante' => 'int',
    ];
    public function getId() { return $this->attributes['id']; }
    public function getNom() { return $this->attributes['name']; }
    public function getPrix() { return $this->attributes['price']; }
}
