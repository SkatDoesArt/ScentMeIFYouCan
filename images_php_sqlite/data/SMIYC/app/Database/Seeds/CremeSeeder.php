<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CremeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --- 2 ÉTOILES ---
            [
                'marque' => 'Nivea',
                'name' => 'Crème Soft – Fleur de Lotus & Huile de Jojoba',
                'description' => 'Hydratante légère, pénétration rapide',
                'typePeau' => 'Normale à mixte',
                'type' => 'creme',
                'niveauPrestige' => 2,
                'price' => 5.50,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 50,
                'image_name' => 'https://m.media-amazon.com/images/I/71hBA2ZIDcL._AC_UF350,350_QL80_.jpg'
            ],
            [
                'marque' => 'Dove',
                'name' => 'Lait Corps Nourrissant Karité & Vanille',
                'description' => 'Nourrissante et adoucissante',
                'typePeau' => 'Sèche',
                'type' => 'creme',
                'niveauPrestige' => 2,
                'price' => 6.20,
                'notation' => 4,
                'taille' => 250,
                'quantiteRestante' => 40,
                'image_name' => 'https://www.beaute-test.com/uploads/images/products/aa4d7e257fa051939cf498c4f2c134ce5b21ab03.jpg'
            ],
            [
                'marque' => 'Le Petit Marseillais',
                'name' => 'Lait Hydratant Fleur d’Oranger Bio',
                'description' => 'Hydratation quotidienne et douce',
                'typePeau' => 'Normale à sèche',
                'type' => 'creme',
                'niveauPrestige' => 2,
                'price' => 4.80,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 35,
                'image_name' => 'https://media.carrefour.fr/medias/3f33b05af1e83cc2ae67c83d4d8fa4fe/p_540x540/03574661644233-a2n1-s01.jpg'
            ],
            [
                'marque' => 'Mixa',
                'name' => 'Crème Corps Hydratante Vanille & Amande Douce',
                'description' => 'Haute tolérance, protection cutanée',
                'typePeau' => 'Sensible à sèche',
                'type' => 'creme',
                'niveauPrestige' => 2,
                'price' => 5.90,
                'notation' => 4,
                'taille' => 400,
                'quantiteRestante' => 25,
                'image_name' => 'https://m.media-amazon.com/images/S/aplus-media/vc/08e4b682-8e22-4ee0-9534-ced6a29ee914.__CR0,149,902,902_PT0_SX300_V1___.jpg'
            ],
            [
                'marque' => 'Neutrogena',
                'name' => 'Lait Corps Hydratant Vanille & Amande',
                'description' => 'Hydratation longue durée',
                'typePeau' => 'Sèche à très sèche',
                'type' => 'creme',
                'niveauPrestige' => 2,
                'price' => 7.50,
                'notation' => 4,
                'taille' => 400,
                'quantiteRestante' => 20,
                'image_name' => 'https://m.media-amazon.com/images/I/71GVpSpMlBL._AC_UF894,1000_QL80_.jpg'
            ],

            // --- 3 ÉTOILES ---
            [
                'marque' => 'Yves Rocher',
                'name' => 'Lait Corps Vanille Bourbon',
                'description' => 'Hydratant parfumé et réconfortant',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 3,
                'price' => 8.50,
                'notation' => 4,
                'taille' => 390,
                'quantiteRestante' => 30,
                'image_name' => 'https://medias.yves-rocher.fr/medias/?context=bWFzdGVyfGltYWdlc3wxMDU5MDB8aW1hZ2UvanBlZ3xzeXNfbWFzdGVyL2ltYWdlcy9oZDIvaDJjLzk3ODAyNzE3MTAyMzh8NzhjOGZlMjY3YmVhZjE1MGY1NWM4YjVkNTJlNmI2OTRmMzQxZGRmYmY2ZmM0NzFmZmU3YTBkMTBhMzU0MmM4MQ&twic=v1/resize=720/background=white'
            ],
            [
                'marque' => 'The Body Shop',
                'name' => 'Beurre Corporel Shea',
                'description' => 'Nutrition intense, texture riche',
                'typePeau' => 'Très sèche',
                'type' => 'creme',
                'niveauPrestige' => 3,
                'price' => 18.00,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 20,
                'image_name' => 'https://m.media-amazon.com/images/I/71xLnaxnYXL.jpg'
            ],
            [
                'marque' => 'Weleda',
                'name' => 'Lait Corps Grenade Régénérant',
                'description' => 'Régénérante et raffermissante',
                'typePeau' => 'Mature ou sèche',
                'type' => 'creme',
                'niveauPrestige' => 3,
                'price' => 16.90,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 15,
                'image_name' => 'https://cdn.redcare-pharmacie.fr/images/F00/384/017/F00384017-p2.jpg'
            ],
            [
                'marque' => 'Roger & Gallet',
                'name' => 'Lait Corps Fleur de Figuier',
                'description' => 'Hydratation légère et fraîche',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 3,
                'price' => 15.50,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 18,
                'image_name' => 'https://admin.roger-gallet.com/media/catalog/product/v/i/visual-secondary_lait-corps_fdt_1.jpg'
            ],
            [
                'marque' => 'Elizabeth Arden',
                'name' => 'Green Tea – Honey Drops Body Cream',
                'description' => 'Hydratante et apaisante',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 3,
                'price' => 22.00,
                'notation' => 5,
                'taille' => 500,
                'quantiteRestante' => 12,
                'image_name' => 'https://www.elizabetharden.fr/cdn/shop/files/EA_GTCLASSIC_SOCIAL_ASSET_8_1x1_FRcopy-Copy_1800x1800.jpg?v=1723561667'
            ],

            // --- 4 ÉTOILES ---
            [
                'marque' => 'L’Occitane en Provence',
                'name' => 'Lait Corps Karité',
                'description' => 'Nourrit et protège durablement',
                'typePeau' => 'Sèche à très sèche',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 24.50,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 15,
                'image_name' => 'https://m.media-amazon.com/images/S/aplus-media-library-service-media/e0ad78fa-d942-4948-bf7f-bc017923ea3f.__CR0,0,600,450_PT0_SX600_V1___.png'
            ],
            [
                'marque' => 'Rituals',
                'name' => 'The Ritual of Sakura – Crème Corps',
                'description' => 'Hydratante et relaxante',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 19.90,
                'notation' => 5,
                'taille' => 220,
                'quantiteRestante' => 22,
                'image_name' => 'https://img01.ztat.net/article/spp-media-p1/0f44dc30307b48f893213bdf8ad85ba5/a4348f39a87c41d79f18a1e31c6ea127.jpg?imwidth=762'
            ],
            [
                'marque' => 'Sol de Janeiro',
                'name' => 'Brazilian Bum Bum Cream (Cheirosa 62)',
                'description' => 'Raffermissante et nourrissante',
                'typePeau' => 'Normale à sèche',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 45.00,
                'notation' => 5,
                'taille' => 240,
                'quantiteRestante' => 10,
                'image_name' => 'https://soldejaneiro.com/cdn/shop/files/SDJ_BBC_Ppage_02.webp?v=1758312007&width=1600'
            ],
            [
                'marque' => 'Caudalie',
                'name' => 'Crème Corps Divine',
                'description' => 'Anti-oxydante, nourrissante sans effet gras',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 26.00,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 20,
                'image_name' => 'https://www.boticinal.com/media/catalog/product/3/5/3522930003700_tdv_body-lotion-400ml.jpg?quality=80&fit=bounds&height=700&width=700&canvas=700:700'
            ],
            [
                'marque' => 'Kiehl’s',
                'name' => 'Crème de Corps Original',
                'description' => 'Ultra-nourrissante, texture épaisse',
                'typePeau' => 'Sèche',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 35.00,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 14,
                'image_name' => 'https://static.thcdn.com/productimg/original/10356176-2294927763272029.jpg'
            ],
            [
                'marque' => 'Clarins',
                'name' => 'Crème Velours Corps Eau Dynamisante',
                'description' => 'Lissante et tonifiante',
                'typePeau' => 'Tous types',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 42.00,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 12,
                'image_name' => 'https://kapao.fr/36434-thickbox_default/eau-dynamisante-.jpg'
            ],
            [
                'marque' => 'Nuxe',
                'name' => 'Lait Corps Parfumé Prodigieux',
                'description' => 'Nourrissant à fini satiné',
                'typePeau' => 'Normale à sèche',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 18.50,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 25,
                'image_name' => 'https://www.pharmaciepolygone.com/media/image/89/93/0090161b3fa48e466400856edbfa.jpg'
            ],
            [
                'marque' => 'Aesop',
                'name' => 'Rind Concentrate Body Balm',
                'description' => 'Nourrissante aux notes d’agrumes',
                'typePeau' => 'Sèche',
                'type' => 'creme',
                'niveauPrestige' => 4,
                'price' => 33.00,
                'notation' => 5,
                'taille' => 100,
                'quantiteRestante' => 10,
                'image_name' => 'https://cdn.50-ml.media/media/catalog/product/a/e/aesop_rind_concentrate_body_balm_500_ml_1_4.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=&width='
            ],

            // --- 5 ÉTOILES ---
            [
                'marque' => 'Chanel',
                'name' => 'Chance – Crème Corps Parfumée',
                'description' => 'Soyeuse et luxueuse',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 85.00,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 5,
                'image_name' => 'https://media.sephora.eu/content/dam/digital/pim/published/C/CHANEL/652366/307774-media_swatch.jpg?scaleWidth=265&scaleHeight=265&scaleMode=fit'
            ],
            [
                'marque' => 'Dior',
                'name' => 'Miss Dior – Crème Corps Nourrissante',
                'description' => 'Nourrissante et élégante',
                'typePeau' => 'Sèche',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 92.00,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 6,
                'image_name' => 'https://media.sephora.eu/content/dam/digital/pim/published/D/DIOR/403603/35924-media_swatch.jpg?scaleWidth=585&scaleHeight=585&scaleMode=fit'
            ],
            [
                'marque' => 'Guerlain',
                'name' => 'Mon Guerlain – Lait pour le Corps',
                'description' => 'Hydratation sensorielle parfumée',
                'typePeau' => 'Normale à sèche',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 62.00,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 10,
                'image_name' => 'https://cdn.notinoimg.com/social/guerlain/3346470131422_01/mon-guerlain___220725.jpg'
            ],
            [
                'marque' => 'Jo Malone',
                'name' => 'English Pear & Freesia – Body Crème',
                'description' => 'Riche et intensément parfumée',
                'typePeau' => 'Sèche',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 78.00,
                'notation' => 5,
                'taille' => 175,
                'quantiteRestante' => 8,
                'image_name' => 'https://cdn2.parfumdreams.de/image/product/134399-216789-1-1.webp?box=528'
            ],
            [
                'marque' => 'Byredo',
                'name' => 'Blanche – Body Cream',
                'description' => 'Hydratation délicate, parfum propre',
                'typePeau' => 'Normale',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 75.00,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 7,
                'image_name' => 'https://img.shopstyle-cdn.com/sim/9c/8a/9c8a496ac7d750fc1ce2186113ac13c4_best/blanche-body-cream-200ml.jpg'
            ],
            [
                'marque' => 'Diptyque',
                'name' => 'Philosykos – Crème Corps',
                'description' => 'Nourrissante et raffinée',
                'typePeau' => 'Normale à sèche',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 72.00,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 9,
                'image_name' => 'https://liquidesconfidentiels.com/cdn/shop/products/laitphilosykos1_800x.png?v=1611930012'
            ],
            [
                'marque' => 'La Mer',
                'name' => 'The Body Crème',
                'description' => 'Réparatrice et revitalisante',
                'typePeau' => 'Très sèche',
                'type' => 'creme',
                'niveauPrestige' => 5,
                'price' => 250.00,
                'notation' => 5,
                'taille' => 300,
                'quantiteRestante' => 3,
                'image_name' => 'https://media.iciparisxl.lu/medias/prd-extra1-283455-954x1192.jpg?context=bWFzdGVyfHByZC1pbWFnZXN8NTU4ODY2fGltYWdlL2pwZWd8YUdObEwyZ3hZaTg1TlRreE5Ua3hPRGsxTURjd0wzQnlaQzFsZUhSeVlURXRNamd6TkRVMVh6azFOSGd4TVRreUxtcHdad3xmMjE1MTMxNTMzZWYxMThiNTAxODEyYjM1Y2M0NTczOGMyYTcxYzE4NjdkYzE2MzMwMTc0OTZhNWZmZGM1MDk3'
            ],
        ];

        $this->db->table('produit')->insertBatch($data);
    }
}