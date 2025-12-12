<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class PanierEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id_panier'=>'int',
        'id_user'=>'int',
    ];
    public function getIdPanier(){return $this->attributes['id_panier'];}
    public function getIdUser(){return $this->attributes['id_user'];}
}
