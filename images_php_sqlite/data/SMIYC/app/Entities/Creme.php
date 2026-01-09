<?php

namespace App\Entities;

/**
 * Classe représentant une crème
 */
class Creme extends AProduitEntity
{
    protected string $typePeau;
    protected int $volume; // en ml

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->typePeau = $data['typePeau'] ?? '';
        $this->volume = $data['volume'] ?? 50;
    }

    public function getTypePeau(): string { return $this->typePeau; }
    public function setTypePeau(string $type): void { $this->typePeau = $type; }

    public function getVolume(): int { return $this->volume; }
    public function setVolume(int $volume): void { $this->volume = $volume; }
}
