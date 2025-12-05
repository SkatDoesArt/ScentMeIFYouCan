<?php

namespace App\Controllers;

class Commande extends BaseController
{
    public function status(int $noCommand)
    {
        return view('Pages/commande/status');
    }

}