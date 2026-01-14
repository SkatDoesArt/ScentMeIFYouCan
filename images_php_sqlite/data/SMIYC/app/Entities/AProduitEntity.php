<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * Classe parente unique pour les Parfums (Produit), Encens et Crèmes
 */
abstract class AProduitEntity extends Entity
{
    // Indispensable pour la persistance en BDD via le Model
    protected $attributes = [
        'id_produit' => null,
        // 'id_encens' => null,
        // 'id_creme' => null,
        // 'id_nocap' => null,
        'name' => null,
        'price' => null,
        'description' => null,
        'niveauPrestige' => null,
        'notation' => null,
        'quantiteRestante' => null,
        'image_name' => null,
        'marque' => null,
        'taille' => null,
        // Champs spécifiques ajoutés ici pour éviter l'écrasement dans les enfants
        'typePeau' => null,
        'origine' => null,
        'dureeCombustion' => null,
        'categorie' => null,
        'saison' => null,
    ];

    // --- GETTERS (Récupération des données) ---

    public function getNom(): string
    {
        return $this->attributes['name'] ?? 'Sans nom';
    }
    public function getPrix(): float
    {
        return (float) ($this->attributes['price'] ?? 0);
    }
    public function getDescription(): string
    {
        return $this->attributes['description'] ?? '';
    }
    public function getNiveauPrestige(): int
    {
        return (int) ($this->attributes['niveauPrestige'] ?? 0);
    }
    public function getNotationProduit(): float
    {
        return (float) ($this->attributes['notation'] ?? 0);
    }
    public function getQuantiteRestante(): int
    {
        return (int) ($this->attributes['quantiteRestante'] ?? 0);
    }
    public function getImageName(): ?string
    {
        return $this->attributes['image_name'];
    }
    public function getMarque(): string
    {
        return $this->attributes['marque'] ?? '';
    }
    public function getTaille(): int
    {
        return (int) ($this->attributes['taille'] ?? 0);
    }

    public function getCategorie(): string
    {
        return $this->attributes['categorie'] ?? '';
    }

    public function getType(): string
    {
        return $this->attributes['type'] ?? '';
    }


    /**
     * Retourne une chaîne d'étoiles basée sur le niveau de prestige
     */
    public function getPrestigeStars(): string
    {
        $nbStars = $this->getNiveauPrestige();
        return $nbStars > 0 ? str_repeat('⭐', $nbStars) : 'Aucun prestige';
    }

    // --- SETTERS (Pour l'Admin et modification) ---

    // Setter pour le niveau de prestige (0 à 5)
    public function setPrestige(int $niveau): void
    {
        $this->attributes['niveauPrestige'] = $niveau;
    }

    // Setters standards
    public function setNom(string $nom): void
    {
        $this->attributes['name'] = $nom;
    }
    public function setPrix(float $prix): void
    {
        $this->attributes['price'] = $prix;
    }
    public function setDescription(string $desc): void
    {
        $this->attributes['description'] = $desc;
    }
    public function setNiveauPrestige(int $niveau): void
    {
        $this->attributes['niveauPrestige'] = $niveau;
    }
    public function setNotationProduit(float $note): void
    {
        $this->attributes['notation'] = $note;
    }
    public function setQuantiteRestante(int $qte): void
    {
        $this->attributes['quantiteRestante'] = $qte;
    }
    public function setImageName(?string $name): void
    {
        $this->attributes['image_name'] = $name;
    }
    public function setMarque(string $marque): void
    {
        $this->attributes['marque'] = $marque;
    }
    public function setTaille(int $taille): void
    {
        $this->attributes['taille'] = $taille;
    }

    public function setCategorie(string $categorie): void
    {
        $this->attributes['categorie'] = $categorie;
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }  

    /**
     * Méthode abstraite : Chaque enfant (Parfum, Encens, Creme) 
     * doit définir son propre chemin d'image public.
     */
    abstract public function getUrl(): string;

    /**
     * Méthode abstraite : Chaque enfant (Parfum, Encens, Creme) 
     * doit définir son propre id.
     */
    abstract public function getId();

    public function getFullTitle(): string
    {
        // On retourne le nom du produit
        return $this->getNom();
    }
}