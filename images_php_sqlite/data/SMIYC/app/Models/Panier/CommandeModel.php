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

    /**
     * Crée une commande et ses lignes à partir du panier.
     *
     * @param int $userId Identifiant de l'utilisateur
     * @param array $cart Tableau contenant les éléments et le total ([0 => items, 1 => total])
     * @param array $livraison Données de livraison optionnelles (nom_complet, adresse, etc.)
     * @return ?CommandeEntity L'entité commande créée ou null en cas d'échec
     */
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

    /**
     * Récupère toutes les commandes.
     *
     * @return array Tableau de commandes
     */
    public function getAllCommande(): array
    {
        return $this->findAll();
    }

    /**
     * Récupère toutes les commandes correspondant à un statut donné.
     *
     * @param mixed $id Identifiant (paramètre présent mais non utilisé actuellement)
     * @param string $status Statut recherché
     * @return array Tableau de commandes
     */
    public function getCommandeByStatus($id, $status): array
    {
        $commandes = $this->asArray()->where('status', $status)->findAll();
        return $commandes;
    }
}
