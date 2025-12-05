<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('Pages/auth/login');
    }

    public function register()
    {
        return view('Pages/auth/register');
    }

    public function forgotPassword()
    {
        return view('Pages/auth/forgot_password');
    }
}

?>