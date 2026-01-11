<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MarquesEntity extends Entity
{
    /**
     * Gère automatiquement si c'est un lien externe ou une image locale
     */
    public function getUrl(): string
    {
        $image = $this->attributes['image_name'];

        // Si l'image commence par http, c'est un lien externe
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // Sinon, c'est une image dans public/pictures/marques/
        return base_url('pictures/marques/' . $image);
    }

    public function getFullTitle(): string
    {
        return $this->attributes['title'] ?? 'Marque sans nom';
    }
}