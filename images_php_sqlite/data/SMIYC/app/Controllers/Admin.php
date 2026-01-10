<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;





class Admin extends BaseController
{
    // ==========================
    // Dashboard et listes
    // ==========================

    /**
     * Tableau de bord admin
     */
    public function dashboard()
    {
        // TODO: Afficher les statistiques / résumé
    }

    /**
     * Liste des produits
     */
    public function products()
    {
        $model = new ProduitModel();

        $data["liste_produits"] = $model->getListePorduit();
        return view('Pages/admin/products', $data);
    }

    /**
     * Liste des utilisateurs
     */
    public function users()
    {
        // TODO: récupérer et afficher les utilisateurs
    }

    /**
     * Liste des commandes
     */
    public function orders()
    {
        // TODO: récupérer et afficher les commandes
    }

    /**
     * Liste des stocks
     */
    public function stock()
    {
        // TODO: récupérer et afficher les stocks
    }

    // ==========================
    // CRUD → Ajouter (Create)
    // ==========================

    /**
     * Ajouter un produit
     */
public function addProduit()
{
    $model = new \App\Models\Produit\ProduitModel();

    if ($this->request->is('post')) {

        // ===== DONNÉES POST =====
        $data = [
            'name'              => $this->request->getPost('name'),
            'price'             => $this->request->getPost('price'),
            'description'       => $this->request->getPost('description'),
            'niveauPrestige'   => $this->request->getPost('niveauPrestige'),
            'notation'          => $this->request->getPost('notation'),
            'taille'            => $this->request->getPost('taille'),
            'quantiteRestante' => $this->request->getPost('quantiteRestante'),
            'marque'            => $this->request->getPost('marque'),
            'categorie'         => $this->request->getPost('categorie'),
        ];

        // ===== IMAGE =====
        $image = $this->request->getFile('image_name');

        if ($image && $image->isValid() && ! $image->hasMoved()) {
            // Génère un nom unique
            $imageName = uniqid('prod_', true) . '.' . $image->getExtension();

            // Déplace l'image dans le dossier "test" (ou ton dossier final)
            $image->move(FCPATH . 'test', $imageName);

            // Ajoute le nom de l'image dans les données à insérer
            $data['image_name'] = $imageName;
        } else {
            // Pas d'image envoyée ou erreur
            $data['image_name'] = null;
        }

        // ===== INSERTION EN BASE =====
        $insert = $model->insert($data);


echo "<pre>DONNÉES INSÉRÉES :\n";
foreach ($data as $key => $value) {
    echo $key . " => " . $value . "\n";
}

echo "\nID INSÉRÉ : " . $insert . "\n";

echo "\nDB ERRORS :\n";
var_dump($model->errors());

    return view('Pages/admin/add/add_product');

        die;
    }

    // ===== GET : afficher le formulaire =====
    return view('Pages/admin/add/add_product');
}



    /**
     * Ajouter un utilisateur
     */
    public function addUser()
    {
        // TODO: formulaire et insertion utilisateur
    }

    /**
     * Ajouter des stocks
     */
    public function addStocks()
    {
        // TODO: formulaire et insertion stock
    }

    /**
     * Ajouter une catégorie
     */
    public function addCategories()
    {
        // TODO: formulaire et insertion catégorie
    }

    // ==========================
    // CRUD → Modifier (Update)
    // ==========================

    /**
     * Modifier un produit
     */
    public function editProduit($id = null)
    {
        // TODO: récupérer le produit $id et afficher formulaire modification
    }

    /**
     * Modifier un utilisateur
     */
    public function editUser($id = null)
    {
        // TODO: récupérer l'utilisateur $id et afficher formulaire modification
    }

    /**
     * Modifier des stocks
     */
    public function editStocks($id = null)
    {
        // TODO: récupérer le stock $id et afficher formulaire modification
    }

    /**
     * Modifier une commande
     */
    public function editCommandes($id = null)
    {
        // TODO: récupérer la commande $id et afficher formulaire modification
    }

    // ==========================
    // CRUD → Supprimer (Delete)
    // ==========================

    /**
     * Supprimer un produit
     */
    public function deleteProduit($id = null)
    {
        // TODO: supprimer le produit $id
    }

    /**
     * Supprimer un utilisateur
     */
    public function deleteUser($id = null)
    {
        // TODO: supprimer l'utilisateur $id
    }

    /**
     * Supprimer des stocks
     */
    public function deleteStocks($id = null)
    {
        // TODO: supprimer le stock $id
    }

    /**
     * Supprimer une commande
     */
    public function deleteCommande($id = null)
    {
        // TODO: supprimer la commande $id
    }

    // ==========================
    // Utilitaires / autres
    // ==========================

    /**
     * Modifier le rôle d'un utilisateur
     */
    public function editRoleUser($id = null)
    {
        // TODO: modifier le rôle de l'utilisateur $id
    }
}



