<?php

namespace App\Entities\Panier;

use CodeIgniter\Entity\Entity;

class PanierEntity extends Entity
{
    protected $attributes = [
        'id_panier' => null,
        'id_user'   => null,
    ];

    protected $casts = [
        'id_panier' => 'integer',
        'id_user'   => 'integer',
    ];
}