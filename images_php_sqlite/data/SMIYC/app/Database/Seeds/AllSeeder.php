<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        
        // $this->call('UserSeeder');
        // $this->call('CommandeSeeder');
        $this->db->table('produit')->truncate();
        $this->db->table('marques')->truncate();
        $this->call('NoCapSeeder');
        $this->call('MarquesSeeder');
        $this->call('EncensSeeder');
        $this->call('CremeSeeder');
        $this->call('ProduitSeeder');
        $this->call('ExotiqueSeeder');
        $this->call('AdminSeeder');
    }
}