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
                'email'    => 'admin@test.com',
                'password' => 'password',
                'group'    => 'admin',
            ],

        ];

        $userModel = new UserModel();

        foreach ($users as $data) {
            $user = new User([
                'username' => $data['username'],
                'active'   => 1,
            ]);

            // Sauvegarde user
            $userModel->save($user);

            // Récupération de l'utilisateur créé
            $user = $userModel->findById($userModel->getInsertID());

            // Ajout email + mot de passe (auth_identities)
            $user->createEmailIdentity([
                'email'    => $data['email'],
                'password' => $data['password'],
            ]);

            // Assignation au groupe admin (auth_groups_users)
            $user->addGroup('admin');
        }
    }
}
