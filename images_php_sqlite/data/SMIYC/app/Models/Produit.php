<?php
namespace App\Models;
class Produit {

    // --- Attributs ---
    private int $idProduit;
    private string $nom;
    private float $prix;
    private string $description;
    private int $niveauPrestige;
    private int $taille;
    private int $quantiteRestante;
    
    // --- Constructeur (<<create>>) ---
    public function __construct(int $idProduit, string $nom, float $prix, string $description) {
        $this->idProduit = $idProduit;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
    }


    // --- Getters & Setters ---
    public function getIdProduit(): int {
        return $this->idProduit;
    }
    public function getId():int{
        return $this->idProduit;
    }


    public function getNom(): string {
        return $this->nom;
    }


    public function getPrix(): float {
        return $this->prix;
    }



    public function getDescription(): string {
        return $this->description;
    }








}

?>
