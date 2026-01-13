<?php

namespace App\Entities;

class CremeEntity extends AProduitEntity
{
    protected $attributes = [
        'id_creme' => null,
        'typePeau' => null,
        'taille'   => null,
    ];

    public function getId() { return $this->attributes['id_creme'] ?? 0; }

    public function getUrl(): string {
        $image = $this->attributes['image_name'] ?? 'default.jpg';
        if (filter_var($image, FILTER_VALIDATE_URL)) return $image;
        return base_url('pictures/cremes/' . $image);
    }


    public function setTypePeau(string $type): void { $this->attributes['typePeau'] = $type; }
    public function setTaille(int $taille): void { $this->attributes['taille'] = $taille; }
}