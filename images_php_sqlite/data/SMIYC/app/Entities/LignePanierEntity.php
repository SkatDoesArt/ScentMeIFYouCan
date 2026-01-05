<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LignePanierEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id_ligne_panier'=>'int',
        'id_produit'=>'int',
        'id_panier'=>'int',
        'id_user'=>'int',
        'quantite'=>'int',
    ];
public function getIdLignePanier(){return $this->attributes['id_ligne_panier'];}
public function getIdProduit(){return $this->attributes['id_produit'];}
public function getIdPanier(){return $this->attributes['id_panier'];}
public function getIdUser(){return $this->attributes['id_user'];}
public function getQuantite(){return $this->attributes['quantite'];}

}
