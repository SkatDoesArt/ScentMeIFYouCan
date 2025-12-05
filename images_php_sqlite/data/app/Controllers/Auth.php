<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function profile()
    {
        return view('auth/profile');
    }

    public function editProfile()
    {
        return view('auth/edit_profile');
    }
}
