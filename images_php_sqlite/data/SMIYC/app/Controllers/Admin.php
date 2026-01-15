<?php

namespace App\Controllers;

use App\Models\Produit\ProduitModel;
use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;
use Throwable;

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
        return view('Pages/admin/dashboard');
    }

    /**
     * Liste des produits
     */
    public function products()
    {
        $model = new ProduitModel();

        // Nombre d'elements par page
        $perPage = 15;

        // Recupere la page courante automatiquement via QueryString (page_group1)
        $data["liste_produits"] = $model->orderBy('id_produit', 'DESC')->paginate($perPage, 'group1');
        $data['pager'] = $model->pager;

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
                'niveauPrestige'    => $this->request->getPost('niveauPrestige'),
                'notation'          => $this->request->getPost('notation'),
                'taille'            => $this->request->getPost('taille'),
                'quantiteRestante'  => $this->request->getPost('quantiteRestante'),
                'marque'            => $this->request->getPost('marque'),
                'categorie'         => $this->request->getPost('categorie') ?? 'Parfums',
                'type'              => $this->request->getPost('type'),
                'typePeau'          => $this->request->getPost('typePeau'),
                'origine'           => $this->request->getPost('origine'),
                'dureeCombustion'   => $this->request->getPost('dureeCombustion'),
                'saison'            => $this->request->getPost('saison') ?? 'Toutes saisons',
            ];

            // ===== IMAGE =====
            $image       = $this->request->getFile('image_name');
            $imageUrl    = $this->request->getPost('image_url'); // champ lien séparé
            $categorie   = $data['categorie'];

            // Dossier selon catégorie
            $imagePath = ($categorie === 'NoCap')
                ? FCPATH . 'pictures/parfums/NoCap/'
                : FCPATH . 'pictures/marques/';

            // Crée le dossier si nécessaire
            if (!is_dir($imagePath)) {
                mkdir($imagePath, 0755, true);
            }

            // PRIORITÉ AU FICHIER
            if ($image && $image->isValid() && ! $image->hasMoved()) {

                $imageName = uniqid('prod_', true) . '.' . $image->getExtension();
                $image->move($imagePath, $imageName);

                $data['image_name'] = $imageName;
            }
            //  SINON → LIEN
            elseif (!empty($imageUrl) && filter_var($imageUrl, FILTER_VALIDATE_URL)) {

                $data['image_name'] = $imageUrl;
            }
            //  SINON → NULL
            else {
                $data['image_name'] = null;
            }

            // ===== INSERTION EN BASE =====
            $insertId = $model->insert($data);

            if ($insertId !== false) {
                session()->setFlashdata(
                    'success',
                    'Produit ajouté avec succès '
                );
            } else {
                session()->setFlashdata(
                    'error',
                    "Problème lors de l'ajout du produit"
                );
            }





            return view('Pages/admin/add/add_product');
        }

        // ===== GET : afficher le formulaire =====
        return view('Pages/admin/add/add_product');
    }



    /**
     * Ajouter un utilisateur
     */


public function addUser()
{
    if ($this->request->is('post')) {

        $userModel = new UserModel();

        $statut   = $this->request->getPost('statut');
        $username = $this->request->getPost('name');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        try {
            //  Création user
            $user = new User([
                'username' => $username,
                'active' => 1,
            ]);
            $userModel->save($user);

            // Récupération de l'utilisateur créé
            $user = $userModel->findById($userModel->getInsertID());

            // Ajout email + mot de passe
            $user->createEmailIdentity([
                'email' => $email,
                'password' => $password,
            ]);

            // Assignation au groupe admin
            $user->addGroup($statut);
            
            session()->setFlashdata('success', 'Utilisateur ajouté avec succès');
            return redirect()->back();

        } catch (Throwable $e) {

            log_message('error', $e->getMessage());
            session()->setFlashdata('error', 'Erreur lors de la création de l’utilisateur');
            return redirect()->back();
        }
    }

    return view('Pages/admin/add/add_user');
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
        throw new PageNotFoundException();
    }

    $produit = $model->find($id);

    if (! $produit) {
        throw new PageNotFoundException('Produit introuvable');
    }

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
            'categorie'         => $this->request->getPost('categorie') ?? 'Parfums',
            'type'              => $this->request->getPost('type'),
            'typePeau'          => $this->request->getPost('typePeau'),
            'origine'           => $this->request->getPost('origine'),
            'dureeCombustion'   => $this->request->getPost('dureeCombustion'),
            'saison'            => $this->request->getPost('saison') ?? 'Toutes saisons',
        ];

        $image       = $this->request->getFile('image_name');
        $imageUrl    = $this->request->getPost('image_url');
        $categorie   = $data['categorie'];

        $imagePath = ($categorie === 'NoCap')
            ? FCPATH . 'pictures/parfums/NoCap/'
            : FCPATH . 'pictures/marques/';

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }

        // Gestion de l'image
        if ($image && $image->isValid() && ! $image->hasMoved()) {
            // Supprime ancienne image si c'était un fichier
            if(!empty($produit->image_name) && !filter_var($produit->image_name, FILTER_VALIDATE_URL)) {
                @unlink($imagePath . $produit->image_name);
            }

            $imageName = uniqid('prod_', true) . '.' . $image->getExtension();
            $image->move($imagePath, $imageName);
            $data['image_name'] = $imageName;
        }
        elseif (!empty($imageUrl) && filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            // Supprime ancienne image si c'était un fichier local
            if(!empty($produit->image_name) && !filter_var($produit->image_name, FILTER_VALIDATE_URL)) {
                @unlink($imagePath . $produit->image_name);
            }

            $data['image_name'] = $imageUrl;
        }
        else {
            // Si aucune nouvelle image, on garde l'ancienne
            $data['image_name'] = $produit->image_name;
        }

        $updated = $model->update($id, $data);

        if ($updated !== false) {
            session()->setFlashdata('success', 'Produit modifié avec succès');
        } else {
            session()->setFlashdata('error', 'Problème lors de la modification du produit');
        }

        return redirect()->to('/admin/edit/product/' . $id);
    }

    return view('Pages/admin/edit/edit_product', ['produit' => $produit]);
}



    /**
     * Modifier un utilisateur
     */
    public function editUser($id = null)
    {
        $model = new UserModel();
        $users = auth()->getProvider();
        if ($id === null) {
            throw new PageNotFoundException('ID manquant');
        }

        $user = $users->findById($id);

        if (! $user) {
            throw new PageNotFoundException('Produit introuvable');
        }
        if ($this->request->is('post')) {

            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ];
            $model->update($id, $data);
            session()->setFlashdata('success', 'Utilisateur modifier');
            return redirect()->to('/admin/user/');
        }
        return view('Pages/admin/edit/edit_user', ['user' => $user]);
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
        $users = auth()->getProvider();
        if ($id === null) {
            return redirect()->to('/admin/users')->with('error', 'ID manquant');
        }
        $users->delete($id, true);
        session()->setFlashdata('success', 'Utilisateur supprimé avec succés');
        return redirect()->to('/admin/users');
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
    public function editRoleUser($id, $statut)
    {
        //  Sécurité : seul un admin peut modifier les rôles


        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            throw new PageNotFoundException('Utilisateur introuvable');
        }

        if (! in_array($statut, ['admin', 'user'], true)) {
            return redirect()->back()->with('error', 'Rôle invalide');
        }

        if ($statut === 'admin') {

            //  Supprimer le groupe "user"
            if ($user->inGroup('user')) {
                $user->removeGroup('user');
            }

            //  Ajouter le groupe "admin"
            if (! $user->inGroup('admin')) {
                $user->addGroup('admin');
            }

            $message = 'Utilisateur promu administrateur';
        } else {

            //  Supprimer le groupe "admin"
            if ($user->inGroup('admin')) {
                $user->removeGroup('admin');
            }

            //  Ajouter le groupe "user"
            if (! $user->inGroup('user')) {
                $user->addGroup('user');
            }

            $message = 'Utilisateur rétrogradé en utilisateur';
        }
        
        $user->activate();
        return redirect()->back()->with('success', $message);
    }


    /**
     * Augmente le stocks d'un produit des stocks
     */
    public function addStocks($id)
    {
        $produitModel = new ProduitModel();
        if($id==null){
            return redirect()->back()->with('error',"Le produit n'éxiste pas");
        }
        $produitModel->IncrementQauntite($id);
        return redirect()->back()->with('success',  'La quantite du produit a été augmenté');
    }

    /**
     * Diminuer le stocks d'un produit des stocks
     */
    public function removeStocks($id = null){
        $produitModel = new ProduitModel();
        if($id==null){
            return redirect()->back()->with('error',"Le produit n'éxiste pas");
        }
        $produitModel->DecrementQauntite($id);
        return redirect()->back()->with('success',  'La quantite du produit a été augmenté');
    }
}
