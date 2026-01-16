<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email'    => 'admin@admin.com',
                'password' => 'admin@admin.com',
                'group'    => 'admin', // Groupe administrateur
            ],
            [
                'username' => 'user',
                'email'    => 'user@user.com',
                'password' => 'user@user.com',
                'group'    => 'user', // Groupe utilisateur standard
            ],
        ];

        $userModel = new UserModel();

        foreach ($users as $data) {
            // Vérifier si l'utilisateur existe déjà
            if ($userModel->where('username', $data['username'])->first()) {
                continue;
            }

            $user = new User([
                'username' => $data['username'],
                'active'   => 1,
            ]);
            
            $userModel->save($user);
00
            // Récupération de l'ID inséré
            $user = $userModel->findById($userModel->getInsertID());

            // Ajout de l'identité (email + mot de passe)
            $user->createEmailIdentity([
                'email'    => $data['email'],
                'password' => $data['password'],
            ]);

            // MODIFICATION ICI : On utilise la clé 'group' définie dans le tableau $data
            $user->addGroup($data['group']);
        }
    }
}