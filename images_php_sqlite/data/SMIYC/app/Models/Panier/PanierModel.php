<?php

namespace App\Models\Panier;

use App\Entities\Panier\PanierEntity;
use App\Models\Produit\ProduitModel;
use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table            = 'panier';
    protected $primaryKey       = 'id_panier';
    protected $returnType       = PanierEntity::class;
    protected $allowedFields    = [
        'id_user'
    ];
    protected bool $updateOnlyChanged = true;


    public function getOrCreatePanier(int $id_user): int
    {
        $panier = $this->where('id_user', $id_user)->first();

        if ($panier !== null) {
            return $panier->id_panier;
            // ou mieux :
            // return $panier->getIdPanier();
        }

        return $this->insert([
            'id_user' => $id_user
        ]);
    }


    /**
     * Ajoute un produit à un panier (crée la ligne ou incrémente la quantité)
     */
    public function addProduit(int $id_panier, int $id_produit, int $quantite = 1): bool
    {
        $ligne = $this->where('id_panier', $id_panier)
            ->where('id_produit', $id_produit)
            ->first();

        if ($ligne !== null) {
            return $this->update(
                $ligne->id_ligne_panier,
                [
                    'quantite' => $ligne->quantite + $quantite
                ]
            );
        }

        return (bool) $this->insert([
            'id_panier'  => $id_panier,
            'id_produit' => $id_produit,
            'quantite'   => $quantite,
        ]);
    }


    /**
     * Supprime un produit d'un panier (toute la ligne)
     */
    public function RemoveProduit(int $id_panier, int $id_produit)
    {
        return $this->where('id_panier', $id_panier)
            ->where('id_produit', $id_produit)
            ->delete();
    }
    /**
     * Vider un panier
     */
    public function ClearPanier(int $id_panier)
    {
        return $this->where('id_panier', $id_panier)->delete();
    }

    /**
     * Récupére toutes les lignes d'un panier avec les infos des produits
     */

    // Dans PanierModel ou dans LignePanierModel
    public function getPanierComplet(int $id_panier): array
    {
        $lignePanierModel = new LignePanierModel();

        return $lignePanierModel
            ->select('ligne_panier.*, produit.name, produit.price')
            ->join('produit', 'produit.id_produit = ligne_panier.id_produit')
            ->where('ligne_panier.id_panier', $id_panier)
            ->findAll(); // ici, findAll() va renvoyer des objets LignePanierEntity
    }

    public function getPanierCompletByUser(int $idUser): array
    {
        $panierId = $this->getOrCreatePanier($idUser);

        $ligneModel   = new LignePanierModel();
        $produitModel = new ProduitModel();

        $lignes = $ligneModel->where('id_panier', $panierId)->findAll();

        $items = [];
        $total = 0;

        foreach ($lignes as $ligne) {
            $produit = $produitModel->find($ligne['id_produit']);

            if (!$produit) continue;

            $totalLigne = $produit->price * $ligne['quantite'];
            $total += $totalLigne;

            $items[] = [
                'id_ligne_panier' => $ligne['id_ligne_panier'],
                'produit'         => $produit,
                'quantite'        => $ligne['quantite'],
                'total_ligne'     => $totalLigne
            ];
        }

        return [$items, $total];
    }


}
