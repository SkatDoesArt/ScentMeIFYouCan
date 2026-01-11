<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MarquesSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // Désactive les contraintes de clés étrangères pour éviter les erreurs lors du truncate
        // $this->db->query('PRAGMA foreign_keys = OFF;');
        
        // On vide la table
        $this->db->table('marques')->truncate();
        
        // $this->db->query('PRAGMA foreign_keys = ON;');

        $data = [
            [
                'image_name' => 'serge_lutens.png', 
                'title'      => 'Serge Lutens',
                'description'=> "Féminité du Bois\nAmbre Sultan\nLa Fille de Berlin"
            ],
            [
                'image_name' => 'tom_ford.jpg', 
                'title'      => 'Tom Ford',
                'description'=> "Black Orchid\nOud Wood\nFucking Fabulous"
            ],
            [
                'image_name' => 'guerlain.jpg', 
                'title'      => 'Guerlain',
                'description'=> "Shalimar\nLa Petite Robe Noire\nMon Guerlain"
            ],
            [
                'image_name' => 'hermes.jpg', 
                'title'      => 'Hermès',
                'description'=> "Terre d’Hermès\nTwilly d’Hermès\nUn Jardin sur le Nil"
            ],
            [
                'image_name' => 'chanel.jpg', 
                'title'      => 'Chanel',
                'description'=> "N°5\nCoco Mademoiselle\nBleu de Chanel"
            ],
            [
                'image_name' => 'dior.png', 
                'title'      => 'Dior',
                'description'=> "J’adore\nSauvage\nMiss Dior"
            ],
            [
                'image_name' => 'valentino.jpg', 
                'title'      => 'Valentino',
                'description'=> "Donna\nBorn in Roma\nUomo"
            ],
            [
                'image_name' => 'prada.jpg', 
                'title'      => 'Prada',
                'description'=> "Infusion d’Iris\nPrada Paradoxe\nLuna Rossa"
            ],
            [
                'image_name' => 'burberry.png', 
                'title'      => 'Burberry',
                'description'=> "Burberry Her\nMy Burberry\nMr. Burberry"
            ],
            [
                'image_name' => 'carolina_herrera.png', 
                'title'      => 'Carolina Herrera',
                'description'=> "Good Girl\n212\nBad Boy"
            ],
            [
                'image_name' => 'givenchy.png', 
                'title'      => 'Givenchy',
                'description'=> "L’Interdit\nGentleman\nIrresistible"
            ],
            [
                'image_name' => 'mugler.png', 
                'title'      => 'Mugler',
                'description'=> "Alien\nAngel\nAura"
            ],
            [
                'image_name' => 'narciso.png', 
                'title'      => 'Narciso Rodriguez',
                'description'=> "For Her\nNarciso Poudrée\nBleu Noir"
            ],
            [
                'image_name' => 'jean_paul_gaultier.png', 
                'title'      => 'Jean Paul Gaultier',
                'description'=> "Le Mâle\nScandal\nClassique"
            ],
            [
                'image_name' => 'armani.png', 
                'title'      => 'Armani',
                'description'=> "Sì\nAcqua di Giò\nStronger With You"
            ],
            [
                'image_name' => 'boucheron.png', 
                'title'      => 'Boucheron',
                'description'=> "Quatre\nJaipur\nBoucheron Femme"
            ],
            [
                'image_name' => 'versace.png', 
                'title'      => 'Versace',
                'description'=> "Bright Crystal\nDylan Blue\nEros"
            ],
            [
                'image_name' => 'rochas.png', 
                'title'      => 'Rochas',
                'description'=> "Mademoiselle Rochas\nEau de Rochas\nRochas Man"
            ],
            [
                'image_name' => 'mont_blanc.png', 
                'title'      => 'Montblanc',
                'description'=> "Legend\nExplorer\nIndividuel"
            ],
            [
                'image_name' => 'viktor_&_rolf.png', 
                'title'      => 'Viktor & Rolf',
                'description'=> "Flowerbomb\nSpicebomb\nGood Fortune"
            ],
            [
                'image_name' => 'azzaro.png', 
                'title'      => 'Azzaro',
                'description'=> "Wanted\nChrome\nAzzaro Pour Homme"
            ],
            [
                'image_name' => 'paco_rabanne.png', 
                'title'      => 'Rabanne',
                'description'=> "1 Million\nOlympea\nPhantom"
            ],
            [
                'image_name' => 'https://logo.clearbit.com/dolcegabbana.com', 
                'title'      => 'Dolce & Gabbana',
                'description'=> "Light Blue\nThe One\nK by D&G"
            ],
            [
                'image_name' => 'cerruti_1881.png', 
                'title'      => 'Cerruti 1881',
                'description'=> "1881 Femme\n1881 Homme\nCerruti Image"
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/h5uZi2wuId7hKHYLE3pHVCJimOeJ_ykQX5st-KxY_QA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y3JlYWRzLmNvbS93/cC1jb250ZW50L3Vw/bG9hZHMvMjAyMS8w/Ni9MYWNvc3RlLUxv/Z28tMjAxMS1wcmVz/ZW50LnBuZw', 
                'title'      => 'Lacoste',
                'description'=> "Lacoste Blanc,\nTouch of Pink,\nLacoste Pour Femme ..."
            ],
        ];

        $this->db->table('marques')->insertBatch($data);
    }
}
