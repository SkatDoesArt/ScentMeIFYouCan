<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index(): string
    {
        return view('register');
    }
}
