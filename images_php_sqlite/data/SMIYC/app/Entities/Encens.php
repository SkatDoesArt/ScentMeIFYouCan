<?php

namespace App\Entities;

use App\Entities\ProduitEntity;

/**
 * Classe représentant un encens
 */
class Encens extends AProduitEntity
{
    protected string $origine;
    protected int $dureeCombustion; // en minutes

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->origine = $data['origine'] ?? '';
        $this->dureeCombustion = $data['dureeCombustion'] ?? 60;
    }

    public function getOrigine(): string { return $this->origine; }
    public function setOrigine(string $origine): void { $this->origine = $origine; }

    public function getDureeCombustion(): int { return $this->dureeCombustion; }
    public function setDureeCombustion(int $minutes): void { $this->dureeCombustion = $minutes; }
}
