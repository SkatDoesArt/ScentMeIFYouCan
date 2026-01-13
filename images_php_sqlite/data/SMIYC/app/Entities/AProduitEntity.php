<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

abstract class AProduitEntity extends Entity
{
    // Indispensable pour la persistance en BDD via le Model
    protected $attributes = [
        'id_produit'       => null,
        'name'             => null,
        'price'            => null,
        'description'      => null,
        'niveauPrestige'   => null,
        'notation'         => null,
        'quantiteRestante' => null,
        'image_name'       => null,
        'marque'           => null
    ];

    // Getters / Setters manuels pour l'admin et la logique métier
    public function getId() { return $this->attributes['id_produit'] ?? $this->attributes['id_encens'] ?? 0; }
    
    public function getNom(): string { return $this->attributes['name'] ?? 'Sans nom'; }
    public function setNom(string $nom): void { $this->attributes['name'] = $nom; }

    public function getPrix(): float { return (float)($this->attributes['price'] ?? 0); }
    public function setPrix(float $prix): void { $this->attributes['price'] = $prix; }

    public function getDescription(): string { return $this->attributes['description'] ?? ''; }
    public function setDescription(string $desc): void { $this->attributes['description'] = $desc; }

    public function getNiveauPrestige(): int { return (int)($this->attributes['niveauPrestige'] ?? 0); }
    public function setNiveauPrestige(int $niveau): void { $this->attributes['niveauPrestige'] = $niveau; }

    public function getNotationProduit(): float { return (float)($this->attributes['notation'] ?? 0); }
    public function setNotationProduit(float $note): void { $this->attributes['notation'] = $note; }

    public function getQuantiteRestante(): int { return (int)($this->attributes['quantiteRestante'] ?? 0); }
    public function setQuantiteRestante(int $qte): void { $this->attributes['quantiteRestante'] = $qte; }

    public function getImageName(): ?string { return $this->attributes['image_name']; }
    public function setImageName(?string $name): void { $this->attributes['image_name'] = $name; }
    
    public function getMarque(): string { return $this->attributes['marque'] ?? ''; }
    public function setMarque(string $marque): void { $this->attributes['marque'] = $marque; }

    public function getPrestigeStars(): string {
        return str_repeat('⭐', $this->getNiveauPrestige());
    }

    // Abstract pour forcer les enfants à définir le dossier d'image
    abstract public function getUrl(): string;
}