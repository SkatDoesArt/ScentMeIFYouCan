<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function login()
    {
        return view('Shield/login');
    }


    public function processAuth(): RedirectResponse
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->back();
        }

        $action = $this->request->getPost('action');

        if ($action === 'register') {
            $pseudo = $this->request->getPost('pseudo');
            $email = $this->request->getPost('mail');
            $password = $this->request->getPost('password');

            // TODO: Validation des données (important !)

            // Exemple de logique réussie
            if (strlen($password) >= 6) {
                // Création de l'utilisateur (hashage du mot de passe en DB)
                
                // Définir un message flash pour la session suivante
                session()->setFlashdata('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
                
                // Redirection vers la page de CONNEXION (login) après une inscription réussie
                return redirect()->to(base_url('auth/login'));
            } else {
                session()->setFlashdata('error', 'Le mot de passe doit contenir au moins 6 caractères.');
                // Redirection vers la page de CONNEXION/INSCRIPTION
                return redirect()->back(); // Renvoie au formulaire avec l'erreur
            }
        } 
        
        elseif ($action === 'login') {
            // --- LOGIQUE DE CONNEXION ---
            $email = $this->request->getPost('mail');
            $password = $this->request->getPost('password');

            // TODO: Récupérer l'utilisateur en BDD et vérifier le mot de passe (via password_verify)
            
            // Simulation de la vérification :
            $isLoggedIn = ($email === "test@ci.com" && $password === "ci4"); 

            if ($isLoggedIn) {
                // Connexion réussie : Créer la session utilisateur
                session()->set('isLoggedIn', true);
                session()->set('userEmail', $email);
                session()->setFlashdata('success', 'Connexion réussie !');
                
                // Redirection : Vers la page de profil ou la page précédente
                return redirect()->to(base_url('auth/profile')); // Redirection vers la page 'profile'
                
            } else {
                // Échec de la connexion
                session()->setFlashdata('error', 'Email ou mot de passe incorrect.');
                
                // Redirection vers la page de CONNEXION
                return redirect()->back(); // Renvoie au formulaire avec l'erreur
            }
        }

        // Si l'action n'est pas reconnue
        session()->setFlashdata('error', 'Action non reconnue.');
        return redirect()->to(base_url('auth/login'));
    }

    public function register(): string
    {
        return view('Pages/auth/register');
    }

    public function forgotPassword(): string
    {
        return view('Pages/auth/forgot_password');
    }
    public function profile():string{
        return view('Pages/auth/profile');
    }
}