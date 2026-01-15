<?php

namespace App\Models\Produit\Categorie;

use CodeIgniter\Model;
use App\Entities\NoCapEntity;

class NoCapModel extends Model
{
    // On pointe désormais vers la table collective
    protected $table = 'produit';

    // Ta migration utilise 'id_produit' comme clé primaire
    protected $primaryKey = 'id_produit';

    // Liste complète des colonnes pour autoriser les insertions via Seeder
    // Dans App/Models/NoCapModel.php
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
        'image_name'
        // Ne pas mettre 'order' ici s'il n'est pas dans la migration
    ];

    // On garde l'Entity pour pouvoir utiliser la méthode getUrl()
    protected $returnType = ProduitEntity::class;

    protected $useTimestamps = false;

    /**
     * Récupère les produits de la marque "No Cap".
     *
     * @return array Tableau de produits
     */
    public function getNoCapPerfumes(): array
    {
        return $this->where('marque', 'No Cap')->findAll();
    }

}