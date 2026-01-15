<?php

namespace App\Models\Produit;

use App\Entities\ProduitEntity;
use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produit';
    protected $primaryKey       = 'id_produit';
    protected $returnType       = ProduitEntity::class;
    protected $allowedFields = [
        'name',
        'price',
        'description',
        'niveauPrestige',
        'notation',
        'taille',
        'quantiteRestante',
        'marque',
        'categorie',
        'image_name',
        'type',
        'saison',
        'origine',
    ];
    protected bool $updateOnlyChanged = true;

    /**
     * Renvoie tous les produits disponibles
     */
    public function getDisponibles(): array
    {
        return $this->where('quantiteRestante >', 0)->findAll();
    }

    /**
     * Renvoie un produit par son ID
     */
    public function getById(int $id)
    {
        return $this->find($id);
    }

    /**
     * Renvoie une liste de produits d'une marque
     */
    public function getByMarque(string $marque)
    {
        return $this->like('marque', $marque)->findAll();
    }

    /**
     * Renvoie une liste de produits d'une  catégorie
     */
    public function getByCategorie(string $categorie)
    {
        return $this->like('categorie', $categorie)->findAll();
    }

    /**
     * Renvoie une liste de produits d'une  saison
     */
    public function getBySaison(string $saison)
    {
        return $this->like('saison', $saison)->findAll();
    }

    public function getByOrigine(string $origine)
    {
        return $this->like('origine', $origine)->findAll();
    }

    public function getByType(string $type)
    {
        return $this->like('type', $type)->findAll();
    }

    public function getByPrix(float $prix)
    {
        return $this->where('price <=', $prix)->findAll();
    }

    public function getByMarqueSorted(string $marque, string $col, string $order = 'ASC')
    {
        return $this->like('marque', $marque)
            ->orderBy($col, $order)
            ->findAll();
    }

    public function getByMarqueAndPrix(string $marque, float $prix)
    {
        return $this->where('price <=', $prix)
            ->like('marque', $marque)
            ->findAll();
    }
   

    /**
     * Renvoie la liste des produits
     * @return array
     */
    public function getListeProduit(){
        return $this->findAll();
    }

    /**
     * Augmente la quantité d'un produit
     */
    public function IncrementQauntite(int $id, int $amount = 1): bool
    {
        return $this->builder()
            ->where('id_produit', $id)
            ->set('quantiteRestante', "quantiteRestante + $amount", false)
            ->update();
    }

    /**
     * Diminue la quantité d'un produit
     * (empêche le stock négatif)
     */
    public function DecrementQauntite(int $id, int $amount = 1): bool
    {
        return $this->builder()
            ->where('id_produit', $id)
            ->where('quantiteRestante >=', $amount)
            ->set('quantiteRestante', "quantiteRestante - $amount", false)
            ->update();
    }

}
