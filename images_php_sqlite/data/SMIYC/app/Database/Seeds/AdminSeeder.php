<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //Ajouter les infos des différents admin
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'admin@admin.com',
                'group' => 'admin',
            ],
            [
                'username' => 'user',
                'email' => 'user@user.com',
                'password' => 'user@user.com',
                'group' => 'user',
            ],

        ];

        $userModel = new UserModel();

        foreach ($users as $data) {
            // 1. Vérifier si l'utilisateur existe déjà par son username ou email
            if ($userModel->where('username', $data['username'])->first()) {
                continue; // Passe à l'utilisateur suivant s'il existe déjà
            }

            $user = new User([
                'username' => $data['username'],
                'active' => 1,
            ]);
            $userModel->save($user);

            // Récupération de l'utilisateur créé
            $user = $userModel->findById($userModel->getInsertID());

            // Ajout email + mot de passe
            $user->createEmailIdentity([
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            // Assignation au groupe admin
            $user->addGroup('admin');
        }
    }
}
