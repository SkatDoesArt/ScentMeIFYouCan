<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('Pages/auth/login');
    }

    public function register(): string
    {
        return view('Pages/auth/register');
    }

    public function forgotPassword(): string
    {
        return view('Pages/auth/forgot_password');
    }
}

?>