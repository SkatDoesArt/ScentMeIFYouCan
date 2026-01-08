<?php

namespace App\Controllers;

use App\Models\ProduitModel;

class Admin extends BaseController
{
    public function products()
    {
        $model = new ProduitModel();

        $data["liste_produits"] = $model->getListePorduit();
        return view('Pages/admin/products', $data);
    }
    //Ajouter un produit
    public function addProduit()
    {
        $model = new ProduitModel();

        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();

            $validation->setRules([
                'name'            => 'required|min_length[2]',
                'price'           => 'required|numeric',
                'description'     => 'required',
                'niveau_prestige' => 'required|integer',
                'notation'        => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[5]',
                'taille'          => 'required',
                'quantiteRestante' => 'required|integer|greater_than_equal_to[0]',
                'marque'          => 'required',
                'categorie'       => 'required',
                'image'           => 'uploaded[image]|is_image[image]|max_size[image,2048]'
            ]);

            if (! $validation->run($this->request->getPost())) {
                return view('Pages/admin/add/add_product', [
                    'errors' => $validation->getErrors()
                ]);
            }

            $image = $this->request->getFile('image');
            $newname = uniqid('prod_', true) . '.' . $image->getExtension();
            $image->move(FCPATH . 'test', $newname);

            $insert = $model->insert([
                'name'             => $this->request->getPost('name'),
                'price'            => $this->request->getPost('price'),
                'description'      => $this->request->getPost('description'),
                'niveauPrestige'   => $this->request->getPost('niveau_prestige'),
                'notation'         => $this->request->getPost('notation'),
                'taille'           => $this->request->getPost('taille'),
                'quantiteRestante' => $this->request->getPost('quantiteRestante'),
                'marque'           => $this->request->getPost('marque'),
                'categorie'        => $this->request->getPost('categorie'),
                'image'            => $newname,
            ]);

            if ($insert === false) {
                return view('Pages/admin/add/add_product', [
                    'errors' => $model->errors()
                ]);
            }

            return redirect()->to(base_url('SMIYC/public/admin/add/product'))
                ->with('success', 'Produit ajouté avec succès');
        }

        // AFFICHAGE DU FORMULAIRE (GET)
        return view('Pages/admin/add/add_product');
    }
}
