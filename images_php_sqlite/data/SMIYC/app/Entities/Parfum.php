<?php

namespace App\Entities;

class Parfum extends AProduitEntity
{
    protected int $contenance;
    protected string $familleOlfactive;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->contenance = $data['contenance'] ?? 50;
        $this->familleOlfactive = $data['familleOlfactive'] ?? '';
    }

    public function getContenance(): int { return $this->contenance; }
    public function setContenance(int $val): void { $this->contenance = $val; }

    public function getFamilleOlfactive(): string { return $this->familleOlfactive; }
    public function setFamilleOlfactive(string $val): void { $this->familleOlfactive = $val; }
}
