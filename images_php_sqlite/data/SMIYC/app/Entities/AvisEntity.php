<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class AvisEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id_avis'=>'int',
        'id_user'=>'int',
        'titre'=>'string',
        'contenu'=>'string',
        'date'=>'string',
    ];
    public function getIdAvis(){return $this->attributes['id_avis'];}
    public function getIdUser(){return $this->attributes['id_user'];}
    public function getTitre(){return $this->attributes['titre'];}
    public function getContenu(){return $this->attributes['contenu'];}
    public function getDate(){return $this->attributes['date'];}
}
