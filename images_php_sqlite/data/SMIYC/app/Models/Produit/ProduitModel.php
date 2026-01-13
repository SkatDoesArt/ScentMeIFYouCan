<?php

namespace App\Models\Produit;

use App\Entities\ProduitEntity;
use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produit';
    protected $primaryKey       = 'id_produit';
    protected $useAutoIncrement = true;
    protected $returnType       = ProduitEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
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
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

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

    /**
     * Renvoie la liste des produits des produits
     * @return array
     */
    public function getListePorduit(){
        return $this->findAll();
    }


}
