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
        // $this->db->table('marques')->truncate();
        
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
                'image_name' => 'https://www.dolcegabbana.com/dw/image/v2/BKDB_PRD/on/demandware.static/-/Sites-15/default/dwd72e3365/images/zoom/G8PN9TG7M1C_N0000_2.jpg?sw=740&sh=944', 
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
            [
                'image_name' => 'https://upload.wikimedia.org/wikipedia/fr/9/9c/Ralph_Lauren_%28parfums%29.png', 
                'title'      => 'Ralph Lauren',
                'description'=> "Polo Blue\nPolo Black\nRomance"
            ],
            [
                'image_name' => 'https://fimgs.net/mdimg/dizajneri/o.1289.jpg', 
                'title'      => 'Zadig & Voltaire',
                'description'=> "This Is Her!\nThis Is Him!\nGirls Can Do Anything"
            ],
            [
                'image_name' => 'https://www.gisada.com/cdn/shop/files/Logo-Gisada.jpg?v=1741966498', 
                'title'      => 'Gisada',
                'description'=> "Ambassador\nAmbassador Intense\nImperial"
            ],
            [
                'image_name' => 'https://fimgs.net/mdimg/dizajneri/o.1979.jpg', 
                'title'      => 'Lattafa',
                'description'=> "Oud for Glory\nKhamrah\nAna Abiyedh Rouge"
            ],
            [
                'image_name' => 'https://fimgs.net/mdimg/dizajneri/o.18.jpg', 
                'title'      => 'Calvin Klein',
                'description'=> "CK One\nEuphoria\nEternity"
            ],
            
            [ 
                'image_name' => 'https://logowik.com/content/uploads/images/967_kenzo.jpg', 
                'title'      => 'Kenzo',
                'description'=> "Flower by Kenzo\nKenzo Homme\nKenzo World"
            ],
            [
                'image_name' => 'https://fimgs.net/mdimg/dizajneri/o.35.jpg', 
                'title'      => 'Chloé',
                'description'=> "Chloé Signature\nNomade\nLove Story"
            ],
            [
                'image_name' => 'https://sodasound.fr/wp-content/uploads/Nina-Ricci-avatar-300x300.jpg', 
                'title'      => 'Nina Ricci',
                'description'=> "Nina\nRicci Ricci\nL’Air du Temps"
            ],
            [
                'image_name' => 'https://www.pagesjaunes.fr/media/newdam/6c/c5/30/00/00/18/00/80/5e/7f/66f56cc53000001800805e7f/66f56cc630000074d6805e8a.png', 
                'title'      => 'Rituals',
                'description'=> "Sakura\nAyurveda\nHammam"
            ],
            [
                'image_name' => 'https://fimgs.net/mdimg/dizajneri/o.83.jpg', 
                'title'      => 'Lolita Lempicka',
                'description'=> "Le Premier Parfum\nSi Lolita\nSweet"
            ],
            [
                'image_name' => 'https://auparfum.bynez.com/IMG/moton48.jpg', 
                'title'      => 'Cacharel',
                'description'=> "Amor Amor\nAnaïs Anaïs\nYes I Am"
            ],
            [
                'image_name' => 'https://www.fragrantica.fr/mdimg/dizajneri/o.85.jpg', 
                'title'      => 'Moschino',
                'description'=> "Toy 2\nI Love Love\nFresh Couture"
            ],
            [
                'image_name' => 'https://fimgs.net/mdimg/dizajneri/o.169.jpg', 
                'title'      => 'Yves Rocher',
                'description'=> "Comme une Evidence\nMon Evidence\nSel d’Azur"
            ],

            // --- ENFANTS / BÉBÉ ---
            [
                'image_name' => 'https://www.fragrantica.fr/mdimg/dizajneri/o.1491.jpg', 
                'title'      => 'Disney',
                'description'=> "Princess\nFrozen\nCars"
            ],
            [
                'image_name' => 'https://www.cosmetis.pt/pub/media/brands/mustela_SWEB.jpg', 
                'title'      => 'Mustela',
                'description'=> "Musti\nEau de Soin\nMustela Douceur"
            ],
            [
                'image_name' => 'https://hebammen-testen.de/uploads/2023/12/Logo_NIVEA-BABY_RGB_PNG_800x800.png', 
                'title'      => 'Nivea Baby',
                'description'=> "Baby Moments\nEau de Soin Douce\nFresh Baby"
            ],
            [
                'image_name' => 'https://i0.wp.com/www.freefonts.io/wp-content/uploads/2025/07/Hello-Kitty-Font-2.png?fit=780%2C520&ssl=1', 
                'title'      => 'Hello Kitty',
                'description'=> "Hello Kitty Flowers\nHello Kitty Pink\nHello Kitty Soft"
            ],
            [
                'image_name' => 'https://priveperfumes.com/cdn/shop/collections/benetton-prive-perfumes-banner.webp?v=1741500472&width=1024', 
                'title'      => 'Benetton Kids',
                'description'=> "Kids Boy\nKids Girl\nColors Kids"
            ],
            [
                'image_name' => 'https://s3.ap-southeast-1.amazonaws.com/cdn1.sgliteasset.com/rasignat/images/texteditor/4_1706512589.jpg', 
                'title'      => 'Asdaaf',
                'description'=> "Musk Collection\nOud Collection\nWhite Musk"
            ],
            [
                'image_name' => 'https://excellenceimp.com.br/images/stories/virtuemart/manufacturer/resized/0-al-wataniah_0x400.jpg', 
                'title'      => 'AL Wataniah',
                'description'=> "Arba Wardat\nVelvet Oud\nYara"
            ],
            [
                'image_name' => 'https://bogart-april-be-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/83fca49c4696772e6d56487f17c3a5b5d4adf9d3_ikks_fr.png', 
                'title'      => 'IKKS',
                'description'=> "Little Woman\nYoung Man\nBaby"
            ],
            [
                'image_name' => 'https://www.encorebeauty.com.au/cdn/shop/collections/Adopt_logo.png?v=1719491661', 
                'title'      => 'Adopt',
                'description'=> "Musc Blanc\nFleur de Cerisier\nVanille Bourbon"
            ],
            [
                'image_name' => 'https://www.fragrantica.fr/mdimg/dizajneri/o.2295.jpg', 
                'title'      => 'Little Marcel',
                'description'=> "Vanilla Kids\nBubblegum Kids\nFruits Mix Kids"
            ],
            [
                'image_name' => 'https://www.corinedefarme.fr/content/uploads/sites/2/2025/11/Parfum-Corine-de-Farme.png', 
                'title'      => 'Corine de Farme',
                'description'=> "Princess\nPat’Patrouille\nHello Kitty"
            ],
            [
                'image_name' => 'https://comandkids.fr/wp-content/uploads/2025/08/LOGO-KALOO.png', 
                'title'      => 'Kaloo',
                'description'=> "Kaloo Blue\nKaloo Lilirose\nKaloo Dragée"
            ],
            [
                'image_name' => 'https://paravital.fr/wp-content/uploads/2016/11/Klorane-BB-logo-ph.png', 
                'title'      => 'Klorane Bébé',
                'description'=> "Eau Parfumée Bébé\nPetit Brin\nEau Fraîche Bébé"
            ],
            [
                'image_name' => 'https://p.ventesprivees-fr.com/natura-siberica.png', 
                'title'      => 'Natura Siberica Kids',
                'description'=> "Little Siberica Eau Douce\nFruits\nFlowers"
            ],
            [
                'image_name' => 'https://www.lahabitaciondejulieta.com/wp-content/uploads/2018/01/10300175_1409813512639905_7653019964121904874_n.jpg', 
                'title'      => 'Baby Tous',
                'description'=> "Tous Kids Boy\nTous Kids Girl\nBaby Tous"
            ],
            [
                'title'       => 'Maison Alhambra',
                'description' => 'Filiale de Lattafa spécialisée dans les parfums de prestige, offrant des sillages profonds tels que Noir Sultan et Amber Oud.',
                'image_name'  => 'https://themaison-alhambra.com/wp-content/uploads/2024/06/logo-1024x1024.jpg'
            ],
            [
                'title'       => 'Ard Al Zaafaran',
                'description' => 'Une référence incontournable pour les amateurs de Oud et de musc, connue pour Shaikh Shuyukh et Oud Gold.',
                'image_name'  => 'https://fimgs.net/mdimg/dizajneri/o.2917.jpg'
            ],
            [
                'title'       => 'Swiss Arabian',
                'description' => 'La première maison de parfum aux Émirats Arabes Unis, fusionnant l\'héritage oriental et l\'élégance occidentale avec Shaghaf Oud.',
                'image_name'  => 'https://images.seeklogo.com/logo-png/25/1/swiss-arabian-logo-png_seeklogo-257200.png'
            ],
            [
                'title'       => 'Afnan',
                'description' => 'Marque réputée pour sa collection Supremacy, offrant des parfums sophistiqués qui allient tradition et innovation.',
                'image_name'  => 'https://www.961scents.com/cdn/shop/collections/afnan_logo.png?v=1747839919'
            ],
            [
                'title'       => 'Rasasi',
                'description' => 'Institution familiale de Dubaï reconnue mondialement pour son cuir sophistiqué La Yuqawam et ses senteurs boisées puissantes.',
                'image_name'  => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTulRE8PzrXgNKmyjPeRkgcRNRZRGuRSe0pqg&s'
            ],
            [
                'title'       => 'Ajmal',
                'description' => 'Plus de 70 ans d\'expertise dans l\'art de la parfumerie, célèbre pour sa collection de bois précieux et son iconique Amber Wood.',
                'image_name'  => 'https://www.shutterstock.com/image-vector/ajmal-arabic-name-calligraphy-black-600nw-2440889835.jpg'
            ],
        ];

        $this->db->table('marques')->insertBatch($data);
    }
}
