<?php

namespace App\Controllers;

use App\Models\ProduitModel;

class Dashboard extends BaseController
{
    public function infos_perso()
    {
        return view('Pages/dashboard/infos_perso');
    }

    public function langue_region()
    {
        return view('Pages/dashboard/langue_region');
    }

    public function adresses()
    {
        return view('Pages/dashboard/adresses');
    }

    public function moyen_paiement()
    {
        return view('Pages/dashboard/moyen_paiement');
    }

    public function suivi_commande()
    {
        return view('Pages/dashboard/suivi_commande');
    }

    public function historique_commandes()
    {
        return view('Pages/dashboard/historique_commandes');
    }



}
