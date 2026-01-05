<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProduitEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = [];
    protected $casts   = [
        'id_produit'       => 'int',
        'name'             => 'string',
        'price'            => 'float',
        'description'      => 'string',
        'niveauPrestige'   =>'int',
        'notation'         => 'int',
        'taille'           => 'int',
        'quantiteRestante' => 'int',
        'marque'           =>'string',
        'categorie'        =>'string',
    ];
    public function getId(){return $this->attributes['id_produit'];}
    public function getNom() { return $this->attributes['name']; }
    public function getPrix() { return $this->attributes['price']; }
    public function getDescription(){return $this->attributes['description'];}
    public function getNotation(){return $this->attributes['notation'];}
    public function getTaile(){return $this->attributes['taille'];}
    public function getQuantiteRestante(){return $this->attributes['quantiteRestante'];}
    public function getMarque(){return $this->attributes['marque'];}
    public function getCategorie(){return $this->attributes['categorie'];}
}
