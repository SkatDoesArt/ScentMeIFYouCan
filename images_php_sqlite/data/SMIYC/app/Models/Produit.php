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
    private ?array $avis =null;
    // --- Constructeur (<<create>>) ---
    public function __construct(int $idProduit, string $nom, float $prix, string $description) {
        $this->idProduit = $idProduit;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
        $this->avis=null;
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

    public function getAvis():array{
        return  $this->avis;
    }
    






}
class Avis {
    private User $user;
    private string $titre;
    private string $contenue;
    private string $date;

    public function __construct(User $user, string $titre, string $contenue,string $date) {
        $this->user = $user;
        $this->titre = $titre;
        $this->contenue = $contenue;
        $this->date = $date;
    }
}
?>
