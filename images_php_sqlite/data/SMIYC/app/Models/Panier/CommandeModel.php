<?php

namespace App\Models\Panier;

use CodeIgniter\Model;
use App\Entities\Panier\CommandeEntity;
use App\Models\Panier\LigneCommandeModel;

class CommandeModel extends Model
{
    protected $table = 'commandes';
    protected $primaryKey = 'id_commande';
    protected $returnType = CommandeEntity::class;
    protected $allowedFields = [
        'user_id', 'date_commande', 'statut', 'total_prix',
        'nom_complet', 'adresse', 'tel', 'ville', 'code_postal', 'pays'
    ];
    protected $useTimestamps = false;

    public function createCommande(int $userId, array $cart, array $livraison = []): ?CommandeEntity
    {
        $totalPrix = $cart[1] ?? 0;

        $commandeData = [
            'user_id' => $userId,
            'date_commande' => date('Y-m-d H:i:s'),
            'statut' => 'En cours',
            'total_prix' => $totalPrix,
            'nom_complet' => $livraison['nom_complet'] ?? null,
            'adresse' => $livraison['adresse'] ?? null,
            'tel' => $livraison['tel'] ?? null,
            'ville' => $livraison['ville'] ?? null,
            'code_postal' => $livraison['code_postal'] ?? null,
            'pays' => $livraison['pays'] ?? null,
        ];

        $this->insert($commandeData);
        $commandeId = $this->getInsertID();

        $ligneModel = new LigneCommandeModel();
        foreach ($cart[0] as $item) {
            $produit = $item['produit'];
            $ligneModel->insert([
                'commande_id' => $commandeId,
                'id_produit' => $produit->id_produit,
                'produit_name' => $produit->name,
                'quantite' => $item['quantite'],
                'prix_unitaire' => $produit->price,
                'total_ligne' => $item['total_ligne']
            ]);
        }

        return $this->find($commandeId);
    }

    /**
     * Récupère toutes les commandes d'un utilisateur (avec leurs lignes de commande).
     *
     * @param int $userId
     * @return array Tableau d'éléments [commande => array, lignes => array]
     */
    public function getCommandeById(int $userId): array
    {
        // Récupère les commandes en tant que tableaux pour faciliter l'ajout des lignes
        $commandes = $this->asArray()->where('user_id', $userId)->orderBy('date_commande', 'DESC')->findAll();

        // Modèle des lignes de commande
        $ligneModel = new LigneCommandeModel();

        foreach ($commandes as &$commande) {
            $commandeId = $commande['id_commande'] ?? null;
            if ($commandeId === null) {
                $commande['lignes'] = [];
                continue;
            }

            // Récupère les lignes associées
            $lignes = $ligneModel->where('commande_id', $commandeId)->findAll();
            $commande['lignes'] = $lignes ?: [];
        }

        return $commandes ?: [];
    }
}
