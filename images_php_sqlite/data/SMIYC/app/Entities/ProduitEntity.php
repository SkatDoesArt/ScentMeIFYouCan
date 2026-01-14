<?php

namespace App\Entities;

/**
 * Entité pour les Parfums
 * Hérite de AProduitEntity pour centraliser les getters/setters et le prestige
 */
class ProduitEntity extends AProduitEntity
{
    /**
     * Attributs spécifiques à la table 'produit'
     */
    // protected $attributes = [
    //     'id_produit' => null,
    //     'categorie' => null,
    // ];

    public function getId()
    {
        return $this->attributes['id_produit'] ?? 0;
    }

    /**
     * Retourne l'URL de l'image. 
     * Gère les liens externes (http) et les images locales.
     */
    public function getUrl(): string
    {
        $image = $this->attributes['image_name'] ?? 'default.jpg';

        // 1. Si c'est un lien complet (http), on le retourne direct
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // 2. CORRECTION : On vérifie si la CATEGORIE est "NoCap" 
        // (C'est ce que tu as mis dans ton NoCapSeeder)
        if ($this->getCategorie() === 'NoCap') {
            return base_url('pictures/parfums/NoCap/' . $image);
        }
        if (strcasecmp($this->getType(), 'parfums') === 0) {
            return base_url('pictures/parfums/' . $image);
        }

        // 3. Sinon, par défaut, on va dans parfums
        return base_url('pictures/parfums/' . $image);
    }

    // --- GETTER / SETTER SPÉCIFIQUE ---

    public function getOrigine(): string
    {  
        return $this->attributes['origine'] ?? '';
    }


    public function getSaison(): string
    {
        return $this->attributes['saison'] ?? 'Toutes saisons';
    }

    public function setSaison(string $saison): void
    {
        $this->attributes['saison'] = $saison;
    }

    public function setOrigine(string $origine): void
    {
        $this->attributes['origine'] = $origine;
    }

    public function getType(): string
    {
        return $this->attributes['type'] ?? 'parfums';
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }
}