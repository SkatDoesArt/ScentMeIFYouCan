<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class NoCapEntity extends Entity
{

    public function getId() { return $this->attributes['id_produit'] ?? 0; }
    /**
     * Retourne l'URL complète de l'image pour la balise <img>
     * Utilisation dans la vue : $image->getUrl()
     */
    public function getUrl(): string
    {
        $image = $this->attributes['image_name'];

        // Si l'image commence par http, c'est un lien externe
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // Sinon, c'est une image dans public/pictures/marques/
        return base_url('pictures/parfums/NoCap/' . $image);
    }

    /**
     * Retourne le nom du produit (anciennement getFullTitle)
     * Utilisation dans la vue : $img->getFullTitle()
     */
    public function getFullTitle(): string
    {
        // On utilise désormais 'name' car 'title' n'existe plus dans la table produit
        return $this->name ?? 'Parfum sans nom';
    }
}