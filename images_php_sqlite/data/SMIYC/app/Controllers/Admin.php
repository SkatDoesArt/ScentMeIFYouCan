<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;
use CodeIgniter\Shield\Models\UserModel;

use CodeIgniter\Exceptions\PageNotFoundException;


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
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('Pages/admin/users', $data);
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
    $model = new ProduitModel();

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


        session()->setFlashdata('success', 'Produit modifié avec succès');


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




    // ==========================
    // CRUD → Modifier (Update)
    // ==========================

    /**
     * Modifier un produit
     */
    public function editProduit($id = null)
    {
        $model = new ProduitModel();

        if ($id === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $produit = $model->find($id);

        if (! $produit) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produit introuvable');
        }

        // ======================
        // POST → update
        // ======================
        if ($this->request->is('post')) {

            $data = [
                'name'              => $this->request->getPost('name'),
                'price'             => $this->request->getPost('price'),
                'description'       => $this->request->getPost('description'),
                'niveauPrestige'    => $this->request->getPost('niveauPrestige'),
                'notation'          => $this->request->getPost('notation'),
                'taille'            => $this->request->getPost('taille'),
                'quantiteRestante'  => $this->request->getPost('quantiteRestante'),
                'marque'            => $this->request->getPost('marque'),
                'categorie'         => $this->request->getPost('categorie'),
            ];

            // IMAGE OPTIONNELLE
            $image = $this->request->getFile('image_name');

            if ($image && $image->isValid() && ! $image->hasMoved()) {
                $imageName = uniqid('prod_', true) . '.' . $image->getExtension();
                $image->move(FCPATH . 'test', $imageName);
                $data['image_name'] = $imageName;
            }

            $model->update($id, $data);

            session()->setFlashdata('success', 'Produit modifié avec succès');

            return redirect()->to('/admin/edit/product/' . $id);
        }

        return view('Pages/admin/edit/edit_product', [
            'produit' => $produit
        ]);
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
        $model = new ProduitModel();

        if ($id === null) {
            return redirect()->to('/admin/products')->with('error', 'ID manquant');
        }

        // Supprime par ID
        $model->delete($id);

        session()->setFlashdata('success', 'Produit supprimé avec succès');
        return redirect()->to('/admin/products');
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
    public function editRoleUser($id,$statut)
    {
    // 🔐 Sécurité : seul un admin peut modifier les rôles


    $userModel = new UserModel();
    $user = $userModel->find($id);

    if (! $user) {
        throw new PageNotFoundException('Utilisateur introuvable');
    }

    if (! in_array($statut, ['admin', 'user'], true)) {
        return redirect()->back()->with('error', 'Rôle invalide');
    }

    if ($statut === 'admin') {

        // 🧹 Supprimer le groupe "user"
        if ($user->inGroup('user')) {
            $user->removeGroup('user');
        }

        // ⭐ Ajouter le groupe "admin"
        if (! $user->inGroup('admin')) {
            $user->addGroup('admin');
        }

        $message = 'Utilisateur promu administrateur';

    } else {

        // 🧹 Supprimer le groupe "admin"
        if ($user->inGroup('admin')) {
            $user->removeGroup('admin');
        }

        // ⭐ Ajouter le groupe "user"
        if (! $user->inGroup('user')) {
            $user->addGroup('user');
        }

        $message = 'Utilisateur rétrogradé en utilisateur';
    }

    return redirect()->back()->with('success', $message);
    }
}