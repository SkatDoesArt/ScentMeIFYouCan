<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel as ProduitProduitModel;
use App\Models\ProduitModel;




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
        $model = new ProduitProduitModel();

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
        helper(['form']);

        $model = new ProduitProduitModel();

        if ($this->request->getMethod() === 'post') {

            $rules = [
                'name'             => 'required|min_length[2]',
                'price'            => 'required|numeric',
                'description'      => 'required',
                'niveauPrestige'   => 'required|integer',
                'notation'         => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[5]',
                'taille'           => 'required|integer',
                'quantiteRestante' => 'required|integer',
                'marque'           => 'required',
                'categorie'        => 'required',
                'image_name'       => 'uploaded[image_name]|is_image[image_name]|max_size[image_name,2048]'
            ];



            $image = $this->request->getFile('image_name');
            $imageName = uniqid('_prod',true) . '.' . $image->getExtension();
            $image->move(FCPATH . 'test', $imageName);

            $model->insert([
                'name'             => $this->request->getPost('name'),
                'price'            => $this->request->getPost('price'),
                'description'      => $this->request->getPost('description'),
                'niveauPrestige'   => $this->request->getPost('niveauPrestige'),
                'notation'         => $this->request->getPost('notation'),
                'taille'           => $this->request->getPost('taille'),
                'quantiteRestante' => $this->request->getPost('quantiteRestante'),
                'marque'           => $this->request->getPost('marque'),
                'categorie'        => $this->request->getPost('categorie'),
                'image_name'       => $imageName,
            ]);

            return redirect()
                ->to('/admin/products');
        }

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



