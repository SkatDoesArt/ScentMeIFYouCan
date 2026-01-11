<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MarquesEntity extends Entity
{
    /**
     * Retourne l'URL complète de l'image pour la balise <img>
     * Utilisation dans la vue : $image->getUrl()
     */
    public function getUrl(): string
    {
        // On conserve le chemin vers le dossier spécifique NoCap
        // $this->image_name correspond à la colonne de la table 'produit'
        return base_url('pictures/marques/' . $this->image_name);
    }

    /**
     * Retourne le nom du produit (anciennement getFullTitle)
     * Utilisation dans la vue : $img->getFullTitle()
     */
    public function getFullTitle(): string
    {
        // On utilise désormais 'name' car 'title' n'existe plus dans la table produit
        return $this->name ?? 'Marque sans nom';
    }
}