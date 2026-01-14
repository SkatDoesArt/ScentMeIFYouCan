<?php

namespace App\Controllers;

class Commande extends BaseController
{
    public function status(int $noCommand = 0)
    {
        return view('Pages/commande/status');
    }

}