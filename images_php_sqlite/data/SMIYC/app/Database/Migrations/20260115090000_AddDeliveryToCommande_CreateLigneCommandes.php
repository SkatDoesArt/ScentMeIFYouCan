<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeliveryToCommande_CreateLigneCommandes extends Migration
{
    public function up()
    {
        // Créer la table 'ligne_commandes'
        $this->forge->addField([
            'id_ligne_commande' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'commande_id' => [
                'type'       => 'INT',
                'constraint' => 9,
                'unsigned'   => true,
            ],
            'produit_id' => [
                'type'       => 'INT',
                'constraint' => 9,
                'null'       => true,
            ],
            'produit_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'quantite' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'prix_unitaire' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'total_ligne' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_ligne_commande', true);
        $this->forge->addKey('commande_id');
        $this->forge->addKey('produit_id');

        // Foreign key vers commandes(id_commande) — respecter la clé primaire existante
        $this->forge->addForeignKey('commande_id', 'commandes', 'id_commande', 'CASCADE', 'CASCADE');

        $this->forge->createTable('ligne_commandes');
    }

    public function down()
    {
        // Supprimer la table créée
        $this->forge->dropTable('ligne_commandes', true);

        // Tentative de suppression des colonnes ajoutées à `commandes`.
        // Note: certains moteurs (SQLite) ne supportent pas DROP COLUMN via Forge.
        // Nous essayons malgré tout : si la DB ne le permet pas, laisser aux mainteneurs
        // la tâche de recréer la table sans les colonnes.
        $cols = ['nom_complet', 'adresse', 'tel', 'ville', 'code_postal', 'pays'];
        foreach ($cols as $col) {
            // dropColumn attend le nom de la table et un tableau de colonnes
            try {
                $this->forge->dropColumn('commandes', [$col]);
            } catch (\Exception $e) {
                // Ne pas interrompre la migration de rollback si le SGDB ne le permet pas
            }
        }
    }
}
