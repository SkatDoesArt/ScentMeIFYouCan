<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class NoCapEntity extends Entity
{
    /**
     * Retourne l'URL complète de l'image pour la balise <img>
     * Utilisation dans la vue : $image->getUrl()
     */
    public function getUrl(): string
    {
        // Utiliser ->image_name au lieu de ['image_name'] est plus sûr avec les Entities
        return base_url('pictures/parfums/NoCap/' . $this->image_name);
    }
    /**
     * Optionnel : Retourne un titre par défaut si le champ title est vide
     */
    public function getFullTitle(): string
    {
        return $this->attributes['title'] ?? 'Parfum sans nom';
    }
}