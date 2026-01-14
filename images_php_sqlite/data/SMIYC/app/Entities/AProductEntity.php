<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * Classe abstraite représentant un produit générique
 */
abstract class AProduitEntity extends Entity
{
    protected int $idProduit;
    protected string $nom;
    protected float $prix;
    protected string $description;
    protected int $niveauPrestige;
    protected float $notationProduit;
    protected int $quantiteRestante;
    protected ?string $image_name = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    // Getters / Setters
    public function getIdProduit(): int { return $this->idProduit; }
    public function setIdProduit(int $id): void { $this->idProduit = $id; }

    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): void { $this->nom = $nom; }

    public function getPrix(): float { return $this->prix; }
    public function setPrix(float $prix): void { $this->prix = $prix; }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $desc): void { $this->description = $desc; }

    public function getNiveauPrestige(): int { return $this->niveauPrestige; }
    public function setNiveauPrestige(int $niveau): void { $this->niveauPrestige = $niveau; }

    public function getNotationProduit(): float { return $this->notationProduit; }
    public function setNotationProduit(float $note): void { $this->notationProduit = $note; }

    public function getQuantiteRestante(): int { return $this->quantiteRestante; }
    public function setQuantiteRestante(int $qte): void { $this->quantiteRestante = $qte; }

    public function getImageName(): ?string { return $this->image_name; }
    public function setImageName(?string $name): void { $this->image_name = $name; }

    /**
     * Retourne l'URL publique de l'image du produit
     */
    public function getUrl(): string
    {
        return base_url('pictures/parfums/NoCap/' . ($this->image_name ?? 'default.jpg'));
    }

    /**
     * Titre complet du produit (nom + éventuellement marque)
     */
    public function getFullTitle(): string
    {
        return $this->nom ?? 'Sans nom';
    }
}
