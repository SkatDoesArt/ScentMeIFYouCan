<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        return view('profil');
    }
}
