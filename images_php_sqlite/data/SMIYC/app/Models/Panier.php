<?php
namespace App\Models;



class Panier {
    private int $idPanier;
    /** @var Produit[] $liste_panier */
    private array $liste_panier;

    public function __construct(int $idPanier, array $liste_panier = []) {
        $this->idPanier = $idPanier;
        $this->liste_panier = $liste_panier;
    }

    // Getter ID panier
    public function getIdPanier(): int {
        return $this->idPanier;
    }

    // Getter liste des produits
    public function getListePanier(): array {
        return $this->liste_panier;
    }




    // Calculer le total du panier
    public function calculerTotalPanier(): float {
        $total = 0;
        foreach ($this->liste_panier as $produit) {
            $total += $produit->getPrix();
        }
        return $total;
    }
    public function calculerTotalProduits():float{

    }
}

?>