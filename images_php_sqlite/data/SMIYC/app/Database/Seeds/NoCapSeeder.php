<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoCapSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['image_name' => 'Bat.jpg', 'title' => 'Bat'],
            ['image_name' => 'BookPerfume.jpg', 'title' => 'Book Perfume'],
            ['image_name' => 'Dirt.jpg', 'title' => 'Dirt'],
            ['image_name' => 'Dorian.png', 'title' => 'Dorian'],
            ['image_name' => 'FatElectrician.jpg', 'title' => 'Fat Electrician'],
            ['image_name' => 'Flame.jpeg', 'title' => 'Flame'],
            ['image_name' => 'FuneralHome.jpg', 'title' => 'Funeral Home'],
            ['image_name' => 'KFC.jpg', 'title' => 'KFC'],
            ['image_name' => 'NewCar.jpg', 'title' => 'New Car'],
            ['image_name' => 'Odeur53.png', 'title' => 'Odeur 53'],
            ['image_name' => 'Odeur71.jpg', 'title' => 'Odeur 71'],
            ['image_name' => 'Pizza.jpg', 'title' => 'Pizza'],
            ['image_name' => 'PlayDoh.jpg', 'title' => 'Play-Doh'],
            ['image_name' => 'SecretionMagnifique.jpg', 'title' => 'Sécrétions Magnifiques'],
            ['image_name' => 'Squid.jpg', 'title' => 'Squid'],
        ];

        // On insère les données dans la table 'nocap'
        $this->db->table('nocap')->insertBatch($data);
    }
}
