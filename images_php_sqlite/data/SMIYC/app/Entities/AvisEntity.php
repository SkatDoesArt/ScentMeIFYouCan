<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Entities\Users\Acheteur;
use App\Entities\ProduitEntity;

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

    public function __construct(?Acheteur $auteur = null, ?ProduitEntity $produit = null, string $titre = '', string $contenu = '', int $note = 0)
    {
        // Ensure Entity internals initialized
        parent::__construct([]);

        if ($titre !== '' || $contenu !== '' || $produit !== null) {
            $user = null;
            if ($auteur !== null) {
                $user = $auteur->getUser();
            }

            $this->attributes['id_user'] = $user ? $user->getIdUser() : null;
            $this->attributes['titre'] = $titre;
            $this->attributes['contenu'] = $contenu;
            $this->attributes['date'] = date('Y-m-d H:i:s');
            // Note: $note attribute handled if present in DB schema
            $this->syncOriginal();
        }
    }

    public function getIdAvis(){return $this->attributes['id_avis'];}
    public function getIdUser(){return $this->attributes['id_user'];}
    public function getTitre(){return $this->attributes['titre'];}
    public function getContenu(){return $this->attributes['contenu'];}
    public function getDate(){return $this->attributes['date'];}
}
