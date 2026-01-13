<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EncensSeeder extends Seeder
{
    public function run()
    {
        // --- NETTOYAGE ---
        // $this->db->table('produit')->truncate();

        $data = [
            // --- RITUALS ---
            [
                'image_name' => 'https://imgs.search.brave.com/TINGnmOwpkQGQW3Y2aoxvPLBk8kgdN6I7vGbdIn8ceY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NDFzaTUzajBCM0wu/anBn',
                'name' => 'The Ritual of Sakura – Fragrance Sticks',
                'description' => "Une fragrance délicate de fleurs de cerisier et de lait de riz pour un nouveau départ.",
                'price' => 29.90,
                'niveauPrestige' => 4,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 20,
                'marque' => 'Rituals',
                'origine' => 'Pays-Bas',
                'dureeCombustion' => 120,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/d40lEYBfUmwpgaLpqmRFzp62-OaE4Hjbxuks_ZqPIBE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMuc3dlZXRjYXJl/LmNvbS9pbWcvcHJk/LzQ4OC92LTYzODc3/MTk5MzY0MDkzOTg3/OC9yaXR1YWxzLTAy/MzIwMXVoLTEud2Vi/cA',
                'name' => 'The Ritual of Ayurveda – Fragrance Sticks',
                'description' => "Équilibrez vos énergies avec la rose indienne et l'amande douce.",
                'price' => 29.90,
                'niveauPrestige' => 4,
                'notation' => 4,
                'taille' => 250,
                'quantiteRestante' => 15,
                'marque' => 'Rituals',
                'origine' => 'Pays-Bas',
                'dureeCombustion' => 120,
                'type' => 'encens'
            ],

            // --- ZARA HOME ---
            [
                'image_name' => 'https://imgs.search.brave.com/XtmOUtegw93xzaf6IZiNhwS71y1p6VYHslcjvvEQTi8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMuemFyYWhvbWUu/bmV0Ly9hc3NldHMv/cHVibGljL2M1ZGMv/NzFhMC8zZTRiNDEw/ODgyZDUvYjA2NzNk/OGZkZTE1LzQ4NDAw/NzAzMjUwLWE3LzQ4/NDAwNzAzMjUwLWE3/LmpwZz90cz0xNzQz/NzU2NjcwODAxJmY9/YXV0byZ3PTQ4MA',
                'name' => 'White Jasmine – Reed Diffuser',
                'description' => "Un bouquet floral frais dominé par la pureté du jasmin.",
                'price' => 19.99,
                'niveauPrestige' => 3,
                'notation' => 4,
                'taille' => 100,
                'quantiteRestante' => 35,
                'marque' => 'Zara Home',
                'origine' => 'Espagne',
                'dureeCombustion' => 90,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/YOufepLajyyg845NIYdayuztHD2Ra4WfXHAOdqxo0zo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zdGF0/aWMuemFyYS5uZXQv/YXNzZXRzL3B1Ymxp/Yy9kNWJiL2JkNWQv/ODI1ODQ2NTRhMzdi/LzU4ZDdlYzNjZDM5/My8xNjUzMDUyMDIx/ODYwLzE2NTMwNTIw/MjE4NjAuanBnP3Rz/PTE3MDM2NTY0Mjky/ODAmdz0zMTA',
                'name' => 'Amber Musk – Reed Diffuser',
                'description' => "Une atmosphère chaleureuse mêlant musc blanc et ambre doré.",
                'price' => 19.99,
                'niveauPrestige' => 3,
                'notation' => 4,
                'taille' => 100,
                'quantiteRestante' => 25,
                'marque' => 'Zara Home',
                'origine' => 'Espagne',
                'dureeCombustion' => 90,
                'type' => 'encens'
            ],

            // --- MAISON BERGER PARIS ---
            [
                'image_name' => 'https://imgs.search.brave.com/pLWWfFmiL6Bjuu2gngyiBpEtZy9wtvPsCY_Wdr8Hllw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NzFVYi1zSC1jV0wu/anBn',
                'name' => 'Lolita Lempicka – Bouquet Parfumé',
                'description' => "La réinterprétation du parfum iconique : réglisse, violette et cerise.",
                'price' => 34.50,
                'niveauPrestige' => 4,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 12,
                'marque' => 'Maison Berger Paris',
                'origine' => 'France',
                'dureeCombustion' => 180,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/4VmFph_LHs4wOtoP73gn_0VlZIWgO1EPYwQ4B11H8aA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjFCRkU4UndobUwu/anBn',
                'name' => 'Orange Cinnamon – Bouquet Parfumé',
                'description' => "Le classique hivernal mêlant fraîcheur d'agrumes et épices.",
                'price' => 28.00,
                'niveauPrestige' => 3,
                'notation' => 4,
                'taille' => 200,
                'quantiteRestante' => 40,
                'marque' => 'Maison Berger Paris',
                'origine' => 'France',
                'dureeCombustion' => 180,
                'type' => 'encens'
            ],

            // --- ESTEBAN PARIS ---
            [
                'image_name' => 'https://imgs.search.brave.com/ggg1O8dGsfegVJMiR3dVXz-rcSalAwfZUt8yD_CtuuM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/ZHVicnVpdGRhbnNs/YWN1aXNpbmUuZnIv/Y2RuL3Nob3AvZmls/ZXMvYm91cXVldC1w/YXJmdW1lLXRlY2st/ZXQtdG9ua2EtZXN0/ZWJhbl8xLmpwZz92/PTE3MzE1MDkzMjMm/d2lkdGg9MTk0Ng',
                'name' => 'Teck & Tonka – Bouquet Parfumé',
                'description' => "Une fragrance boisée-épicée inoubliable, icône de la maison.",
                'price' => 32.00,
                'niveauPrestige' => 4,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 18,
                'marque' => 'Esteban Paris',
                'origine' => 'France',
                'dureeCombustion' => 240,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/ydoNOPV9ChzZ_5yvk4yQv42kgTOsWRjIa_SjX_PsFJc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NDFNK1g4TE5jSUwu/anBn',
                'name' => 'Ambre Noir – Bouquet Parfumé',
                'description' => "Un ambre intense et mystérieux avec des notes de vanille.",
                'price' => 32.00,
                'niveauPrestige' => 4,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 10,
                'marque' => 'Esteban Paris',
                'origine' => 'France',
                'dureeCombustion' => 240,
                'type' => 'encens'
            ],

            // --- CULTI MILANO ---
            [
                'image_name' => 'https://imgs.search.brave.com/1uuYlcvSPfrRtmD6wZW2O4zE3dfMZ3cbvYIQyH7D1fM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/MzFUU2JDNXI0WEwu/anBn',
                'name' => 'Thé – Diffusore a Bastoncini',
                'description' => "La sérénité d'un thé Sencha japonais à la bergamote.",
                'price' => 75.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 500,
                'quantiteRestante' => 8,
                'marque' => 'Culti Milano',
                'origine' => 'Italie',
                'dureeCombustion' => 360,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/-eGOSO7RnaFyv0MY_-GFRlcTgjA-zExz1UuEJ_j8NLQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/YWxiZXJvc2hvcC5p/dC9jZG4vc2hvcC9m/aWxlcy9QREFTVElB/UkExMDAwTUFDSTAw/MDBfMDIuanBnP3Y9/MTc2NDg2NTM5OSZ3/aWR0aD0xMDAw',
                'name' => 'Aramara – Diffusore a Bastoncini',
                'description' => "Une explosion d'agrumes siciliens et de bois de santal.",
                'price' => 75.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 500,
                'quantiteRestante' => 6,
                'marque' => 'Culti Milano',
                'origine' => 'Italie',
                'dureeCombustion' => 360,
                'type' => 'encens'
            ],

            // --- DR. VRANJES FIRENZE ---
            [
                'image_name' => 'https://imgs.search.brave.com/aAzFyRb_MFQY1PgLLtGI3a5yu29yrKoAH-StpL5k59o/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/bGVzc2Vuc2R1bW9u/ZGUuY29tL0ZpbGVz/LzI1Nzk4L0ltZy8y/NS9EclYtNTAwbWwt/Um9zc28tTm9iaWxl/LUhELnBuZw',
                'name' => 'Rosso Nobile – Diffuser',
                'description' => "L'essence sublime d'un grand vin rouge toscan.",
                'price' => 88.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 5,
                'marque' => 'Dr. Vranjes Firenze',
                'origine' => 'Italie',
                'dureeCombustion' => 300,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/9SSXZQ3H_5i0kmvmHv24kXTsFYRoUTVBt5DxXcuPk-E/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aGVz/b2NpZXR5c2hvcC5j/b20vY2RuL3Nob3Av/ZmlsZXMvZGlmZnVz/ZXItb3VkLW5vYmls/ZS0yNTAtbWwtd2l0/aC1zdGlja3MtZGlm/ZnVzZXItb3VkLW5v/YmlsZS0yNTAtbWwt/d2l0aC1zdGlja3Mt/NTExMzAwLmpwZz92/PTE3MzI5OTExMTAm/d2lkdGg9MTcwNw',
                'name' => 'Oud Nobile – Diffuser',
                'description' => "L'union mystique entre le bois de Oud et la bergamote.",
                'price' => 95.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 4,
                'marque' => 'Dr. Vranjes Firenze',
                'origine' => 'Italie',
                'dureeCombustion' => 300,
                'type' => 'encens'
            ],

            // --- JO MALONE ---
            [
                'image_name' => 'https://imgs.search.brave.com/A_QuBLvJgsOHVpgBv4noMeFgrGmSNdfCmLC3Tv6Syik/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jcmVt/ZWRlbGFjcmVtZS5z/aG9wL2NhY2hlL2dh/bGxlcmllcy8xNDIt/NzY3Ny9qby1tYWxv/bmUtbG9uZG9uLWxp/bWUtYmFzaWwtbWFu/ZGFyaW4tZGlmZnVz/ZXItMi1wYXRhbHB1/LWt2YXBpa2xpcy0x/NjUtbWwtY3JlbWUt/ZGUtbGEtY3JlbWUu/anBn',
                'name' => 'Lime Basil & Mandarin – Diffuser',
                'description' => "Le parfum signature de Jo Malone : frais, piquant et audacieux.",
                'price' => 82.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 165,
                'quantiteRestante' => 7,
                'marque' => 'Jo Malone',
                'origine' => 'Royaume-Uni',
                'dureeCombustion' => 150,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/I08EtDZJvPEqNhZZwB2b3Mm8Ng6_070MJIB1qQ2F9mI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y29zbWV0aWZ5LmNv/bS9pbWFnZXMvc3Vw/cGxlbWVudGFyeS9q/by1tYWxvbmUtbG9u/ZG9uLXBlb255LWJs/dXNoLXN1ZWRlLWRp/ZmZ1c2VyLTE3NTkz/MjcwNDMtcGR0Y29f/c2EwY2Y3ZC5qcGc',
                'name' => 'Peony & Blush Suede – Diffuser',
                'description' => "Une sensualité florale de pivoines et de daim doux.",
                'price' => 82.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 165,
                'quantiteRestante' => 5,
                'marque' => 'Jo Malone',
                'origine' => 'Royaume-Uni',
                'dureeCombustion' => 150,
                'type' => 'encens'
            ],

            // --- DIPTYQUE ---
            [
                'image_name' => 'https://imgs.search.brave.com/elcilATqtJpGKP_lFhzWGfJ6vJ4_AF3w4N7zEjmwNnA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/YmFzbGVyLWJlYXV0/eS5kZS9vdXQvcGlj/dHVyZXMvZ2VuZXJh/dGVkL3Byb2R1Y3Qv/MS85ODBfOTgwXzEw/MC8yNTIzNzI4LWRp/cHR5cXVlLVNldC1k/ZS1kaWZmdXNldXJz/LWRlLXBhcmZ1bS1k/LWFtYmlhbmNlLUJh/aWVzLjNkMjhlOTVm/LmpwZw',
                'name' => 'Baies – Diffuseur de Parfum',
                'description' => "Le parfum légendaire mêlant roses et feuilles de cassis.",
                'price' => 150.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 3,
                'marque' => 'Diptyque',
                'origine' => 'France',
                'dureeCombustion' => 200,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/M25QuDMIOBno6REUPC3ymJhQoJ9YA_gMBgFAobQTHvw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/YmFzbGVyLWJlYXV0/eS5kZS9vdXQvcGlj/dHVyZXMvZ2VuZXJh/dGVkL3Byb2R1Y3Qv/My8xMjAwXzEyMDBf/MTAwLzI1NjkwMzUt/ZGlwdHlxdWUtUmVj/aGFyZ2UtZHUtZGlm/ZnVzZXVyLWRlLXBh/cmZ1bS1GaWd1aWVy/LTIwMC1tbC4wMTYw/YjFhZC5qcGc',
                'name' => 'Figuier – Diffuseur',
                'description' => "Toute l'essence du figuier : le bois, les feuilles et les fruits.",
                'price' => 150.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 4,
                'marque' => 'Diptyque',
                'origine' => 'France',
                'dureeCombustion' => 200,
                'type' => 'encens'
            ],

            // --- BYREDO ---
            [
                'image_name' => 'https://imgs.search.brave.com/wzOkBIsAi-Cl9r2fmWEir9Qny77L_g8vLxFiW-k8x_4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y3JlYW1jYW5kbGVj/by5jb20vY2RuL3No/b3AvcHJvZHVjdHMv/Q3JlYW1fQ2FuZGxl/X0NvX1JFRURfRElG/RlVTRVJfNF8wZGY3/YjI0OS05Y2IwLTQ2/ZWYtYTExMi0yOTYw/ZGViNzA5OGNfMTAy/NHgxMDI0LmpwZz92/PTE2NjkwNjM0NjM',
                'name' => 'Bibliothèque – Reed Diffuser',
                'description' => "Un monde de livres anciens, de cuir et de vanille.",
                'price' => 110.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 2,
                'marque' => 'Byredo',
                'origine' => 'Suède',
                'dureeCombustion' => 240,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/SymsfVYRTfdaW0n-bak5ww3IfWImoBFIkdvmDMBY9VE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/dmluZXZpZGEuY29t/L2Nkbi9zaG9wL2Zp/bGVzL0ZPQlAtUk9B/LTE5MTctMTIwTUxf/MjUtMDktMjZfYTM4/MGI4OGUtNjhiNi00/NTAxLWE1ZTAtOWZh/N2Q5M2YzZjQyLnBu/Zz92PTE3NTg4ODkz/ODkmd2lkdGg9MjUw/MA',
                'name' => 'Blanche – Reed Diffuser',
                'description' => "La pureté du blanc, du linge propre et du savon aldéhydé.",
                'price' => 110.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 250,
                'quantiteRestante' => 4,
                'marque' => 'Byredo',
                'origine' => 'Suède',
                'dureeCombustion' => 240,
                'type' => 'encens'
            ],

            // --- THE BODY SHOP ---
            [
                'image_name' => 'https://imgs.search.brave.com/VaF5B6YYU0atoS7vjSUPJ1mYgAO8MCjjfH3DfDayiHs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aGVi/b2R5c2hvcC5vbS9t/ZWRpYS9jYXRhbG9n/L2NhdGVnb3J5L1JF/RURfRElGRlVTRVIu/anBn',
                'name' => 'Vanilla Reed Diffuser',
                'description' => "Une douceur gourmande de vanille crémeuse.",
                'price' => 15.00,
                'niveauPrestige' => 3,
                'notation' => 4,
                'taille' => 125,
                'quantiteRestante' => 50,
                'marque' => 'The Body Shop',
                'origine' => 'Royaume-Uni',
                'dureeCombustion' => 100,
                'type' => 'encens'
            ],

            // --- MUJI ---
            [
                'image_name' => 'https://imgs.search.brave.com/rnd8NTU4s8jFh7PrryE4i_cGQBvjcpKaN3ZLGiasUlc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/bXVqaS51cy9jZG4v/c2hvcC9maWxlcy80/NTUwNTEyMzY5OTEy/X29yZy5qcGc_dj0x/NzY0ODcxMzExJndp/ZHRoPTUxMg',
                'name' => 'Green Herbal – Aroma Diffuser Oil',
                'description' => "Mélange tonifiant d'herbes aromatiques et de sauge.",
                'price' => 18.00,
                'niveauPrestige' => 3,
                'notation' => 4,
                'taille' => 30,
                'quantiteRestante' => 30,
                'marque' => 'Muji',
                'origine' => 'Japon',
                'dureeCombustion' => 60,
                'type' => 'encens'
            ],
            [
                'image_name' => 'https://imgs.search.brave.com/8Ld9pB6CxoR07yabw7I09uciPHA2kDv6HODNQvd8cr0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9teWph/cGFuZXNld29ybGQu/Y29tL2Nkbi9zaG9w/L2ZpbGVzL2Fyb21h/LWRpZmZ1c2VyLWhp/bWVzaGFyYS1oaW5v/a2ktZXNzZW50aWFs/LW9pbC0xMTgwNTk5/MTQ5LndlYnA_dj0x/NzUzMTA2Mzk2Jndp/ZHRoPTE0NDA',
                'name' => 'Hinoki – Aroma Diffuser Oil',
                'description' => "L'odeur boisée ancestrale du cyprès japonais Hinoki.",
                'price' => 24.00,
                'niveauPrestige' => 4,
                'notation' => 5,
                'taille' => 30,
                'quantiteRestante' => 15,
                'marque' => 'Muji',
                'origine' => 'Japon',
                'dureeCombustion' => 60,
                'type' => 'encens'
            ],

            // --- PRANAROM ---
            [
                'image_name' => 'https://imgs.search.brave.com/iiLklSnQ40XBDvft-RkBdoU8Mvt4v-aVJW6sJZpreus/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/cGhhcm1hc2hvcGku/Y29tL21lZGlhL2Nh/dGFsb2cvcHJvZHVj/dC9jYWNoZS8wMTUw/ZjdmOTBjNDM1MGY0/NmQ1MjQ4YzZkOTM5/NTJkMS9IL3UvSHVp/bGUtZXNzZW50aWVs/bGUtZGUtTGF2YW5k/ZS1maW5lLUFPUC1Q/cmFuYXJvbS1mbGFj/b24uanBlZw',
                'name' => 'Lavande Fine – Diffusion',
                'description' => "Huile de diffusion bio à la lavande vraie pour l'apaisement.",
                'price' => 12.90,
                'niveauPrestige' => 3,
                'notation' => 5,
                'taille' => 30,
                'quantiteRestante' => 50,
                'marque' => 'Pranarōm',
                'origine' => 'Belgique',
                'dureeCombustion' => 45,
                'type' => 'encens'
            ],

            // --- FLORIS LONDON ---
            [
                'image_name' => 'https://imgs.search.brave.com/vc9MymQWjyjlZN-jJESeJL4Ob2XnSHcl5DZYO2pWpVI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9mcmFn/cmFuY2Vob3VzZS5j/by51ay93cC1jb250/ZW50L3VwbG9hZHMv/MjAyNC8wNS9GbG9y/aXMtU2FuZGFsd29v/ZC1QYXRjaG91bGkt/UmVlZC1EaWZmdXNl/ci0yMDBtbC1QYWNr/LVNob3QuanBn',
                'name' => 'Sandalwood & Patchouli – Reed Diffuser',
                'description' => "Un raffinement britannique classique aux bois précieux.",
                'price' => 55.00,
                'niveauPrestige' => 5,
                'notation' => 5,
                'taille' => 200,
                'quantiteRestante' => 10,
                'marque' => 'Floris London',
                'origine' => 'Royaume-Uni',
                'dureeCombustion' => 180,
                'type' => 'encens'
            ],
        ];

                // --- NETTOYAGE ---
        // $this->db->table('produit')->truncate();

        $this->db->table('produit')->insertBatch($data);
    }
}