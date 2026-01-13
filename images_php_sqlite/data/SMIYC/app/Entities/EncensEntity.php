<?php

namespace App\Entities;

class EncensEntity extends AProduitEntity
{
    // // On ajoute les champs spécifiques à l'encens
    // protected $attributes = [
    //     'id_encens'        => null,
    //     'origine'         => null,
    //     'dureeCombustion' => null,
    //     // 'taille'          => null
    // ];

    public function getId() { return $this->attributes['id_produit'] ?? 0; }
    public function getUrl(): string {
        $image = $this->attributes['image_name'] ?? 'default.jpg';
        if (filter_var($image, FILTER_VALIDATE_URL)) return $image;
        return base_url('pictures/encens/' . $image);
    }

    public function getOrigine(): string { return $this->attributes['origine'] ?? 'Inconnue'; }
    public function getDureeCombustion(): int { return $this->attributes['dureeCombustion'] ?? 0; }
    public function setOrigine(string $origine): void { $this->attributes['origine'] = $origine; }
    public function setDureeCombustion(int $duree): void { $this->attributes['dureeCombustion'] = $duree; }
    // public function setTaille(int $taille): void { $this->attributes['taille'] = $taille; }
}