<?php

namespace App\Models;



class Panier
{
    private int $idPanier;

    private array $liste_panier;

    public function __construct(int $idPanier, array $liste_panier = [])
    {
        $this->idPanier = $idPanier;
        $this->liste_panier = $liste_panier;
    }

    // Getter ID panier
    public function getIdPanier(): int
    {
        return $this->idPanier;
    }

    // Getter liste des produits
    public function getListePanier(): array
    {
        $fusion = [];

        foreach ($this->liste_panier as $produit) {
            $id = $produit->getId();

            if (!isset($fusion[$id])) {
                // Premiere apparition du produit
                $fusion[$id] = [
                    "produit" => $produit,
                    "quantite" => 1
                ];
            } else {
                // Doublon --> on augmente la quantité
                $fusion[$id]["quantite"]++;
            }
        }

        return $fusion; // renvoie une liste SANS doublons
    }





    // Calculer le total du prix du panier
    public function calculerTotalPanier(): float
    {
        $total = 0;
        foreach ($this->liste_panier as $produit) {
            $total += $produit->getPrix();
        }
        return $total;
    }
    /**
     * Return le total des produits dans le panier
     */
    public function getQuantiteTotal(): int
    {
        $total = 0;

        foreach ($this->getListePanier() as $item) {
            $total += $item["quantite"];
        }

        return $total;
    }
}
