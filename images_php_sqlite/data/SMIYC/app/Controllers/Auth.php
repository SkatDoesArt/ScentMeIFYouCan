<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('Shield/login');
    }


//    public function processAuth(): RedirectResponse
//    {
//
//    }

    public function register(): string
    {
        return view('Pages/auth/register');
    }

    public function forgotPassword(): string
    {
        return view('Pages/auth/forgot_password');
    }
    public function profile():string{

        return view('Pages/dashboard/infos_perso');
    }
    public function logout(){
        auth()->logout();
        return redirect()->to('/');
    }

}