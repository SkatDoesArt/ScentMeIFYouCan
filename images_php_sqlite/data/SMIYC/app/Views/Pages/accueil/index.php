<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>SMIYC/public/css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>SMIYC/public/css/index.css">
    
    <!-- FONTS -->../auth/login.php
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- BACKGROUND -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://icons8.com/icons/set/kotlin">

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="<?php echo base_url(); ?>SMIYC/public/js/index.js" defer></script>
    
    <title>SMIYC</title>
</head>

<body>

    <section id="home">
        <div id="container-home">
            <!-- le truc cool en fond  -->
            <div id="back">
                <canvas id="glcanvas"></canvas>
                <script id="vertex-shader" type="x-shader/x-vertex">
                        attribute vec2 a_position;
                        void main() {
                        gl_Position = vec4(a_position, 0.0, 1.0);
                        }
                    </script>
                <script id="fragment-shader" type="x-shader/x-fragment">
                        #ifdef GL_ES
                        precision highp float;
                        #endif

                        uniform vec2 u_resolution;
                        uniform vec2 u_mouse;
                        uniform float u_time;

                        vec3 palette3(float t, float factor) {
                            vec3 a = vec3(0.5) + 0.3 * sin(vec3(0.1, 0.3, 0.5) * factor);
                            vec3 b = vec3(0.5) + 0.3 * cos(vec3(0.2, 0.4, 0.6) * factor);
                            vec3 c = vec3(1.0) + 0.5 * sin(vec3(0.3, 0.7, 0.9) * factor);
                            vec3 d = vec3(0.25, 0.4, 0.55) + 0.2 * cos(vec3(0.5, 0.6, 0.7) * factor);
                            return a + b * cos(6.28318 * (c * t + d));
                        }

                        void main() {
                            vec2 st = (gl_FragCoord.xy / u_resolution.xy) * 2.0 - 1.0;
                            st.x *= u_resolution.x/u_resolution.y;
                            vec3 color = vec3(0.0);

                            for (float i = 1.0; i < 6.0; i++) {
                                vec2 st0 = st;
                                float sgn = 1.0 - 2.0 * mod(i, 2.0);
                                float t = u_time * 0.02 - float(i);
                                st0 *= mat2(cos(t), sin(t), -sin(t), cos(t));

                                float R = length(st0);
                                float d = R * i;
                                float angle = atan(st0.y, st0.x) * 3.0;

                                vec3 pal = palette3(-exp((length(d) * -0.9)), abs(d) * 0.4);

                                float radial = exp(-R); 
                                radial *= smoothstep(1.2, 0.5, R);
                                pal *= radial;

                                float phase = -(d + sgn * angle) + u_time * 0.3;
                                float v = sin(phase);
                                v = max(abs(v), 0.02);
                                float w = pow(0.02 / v, 0.8);

                                color += pal * w;
                            }

                            gl_FragColor = vec4(color, 1.0);
                        }
                    </script>
            </div>
            <div id="home-title">
                <h4>ScentMeIfYouCan</h4>
            </div>
            <div id="go-shopping">
                <a id="go-shopping-link" href="#accueil">GO SHOPPING</a>
            </div>
        </div>
    </section>

    <header id="header">
        <div id="header-container">
            <div id="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <nav id="nav-upper">
                <h1 id="bigname">SMIYC</h1>
                <form class="recherche" role="search">
                    <label class="hidden" for="search">Recherche</label>
                    <input type="search" id="search" placeholder="Rechercher un produit, une marque" inputmode="search"
                        interkeyhint="search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                        class="min-h-iconLarge min-w-iconLarge stroke-[0.125rem] text-text-primary" alt="" height="2rem"
                        width="2rem">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M22.067 15a7 7 0 1 1-14 0 7 7 0 0 1 14 0m-1.155 6.844a9 9 0 1 1 1.365-1.456q.045.039.088.082l4.482 4.482c.488.488.567 1.2.176 1.59s-1.102.312-1.59-.176l-4.482-4.482z"
                            clip-rule="evenodd"></path>
                    </svg>
                </form>
                <div id="nav-buttons">
                    <a href="<?php  echo "#" ?>">
                        <p>Se connecter</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                            class="min-h-iconLarge min-w-iconLarge stroke-[0.125rem]" alt="" height="2rem" width="2rem">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M21 9a5 5 0 1 1-10 0 5 5 0 0 1 10 0m-2 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0M16 16c-4.675 0-7.629 1.413-9.443 3.358-1.79 1.92-2.343 4.222-2.5 5.776C3.884 26.853 5.333 28 6.805 28h18.39c1.471 0 2.92-1.147 2.747-2.866-.156-1.554-.709-3.856-2.499-5.775-1.814-1.946-4.768-3.36-9.443-3.36m-9.953 9.335c.133-1.316.592-3.132 1.972-4.612C9.375 19.268 11.751 18 16 18c4.25 0 6.624 1.268 7.98 2.723 1.381 1.48 1.84 3.296 1.973 4.612a.52.52 0 0 1-.162.442.86.86 0 0 1-.596.223H6.805a.86.86 0 0 1-.597-.223.52.52 0 0 1-.161-.442"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                            class="min-h-iconLarge min-w-iconLarge stroke-[0.125rem]" alt="" height="2rem" width="2rem">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M21.997 11q.002-.23.002-.5C22 6.91 19.313 4 16 4s-6 2.91-6 6.5q0 .27.003.5H6.094a2 2 0 0 0-1.984 2.254l1.665 13A2 2 0 0 0 7.76 28h16.478a2 2 0 0 0 1.984-1.747l1.657-13A2 2 0 0 0 25.893 11zM20 10.5l-.001.42c-.167.017-.371.031-.623.043C18.59 11 17.52 11 16 11s-2.59 0-3.376-.037a12 12 0 0 1-.622-.043l-.002-.42C12 7.861 13.938 6 16 6s4 1.861 4 4.5M6.094 13 7.76 26h16.478l1.657-13z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
        <nav id="nav-list">
            <span class="categorie" role="link">Homme</span>
            <span class="categorie" role="link">Femme</span>
            <span class="categorie" role="link">Unisexe</span>
            <span class="categorie" role="link">Enfant</span>
            <span class="categorie" role="link">Marques</span>
            <span class="categorie" role="link">Saison</span>
            <span class="categorie" role="link">Sniff&Chill</span>
            <span class="categorie" role="link">Exotique</span>
            <span class="categorie" role="link">Crème</span>
        </nav>
    </header>

    <section id="accueil">
        <div class="title">
            <span></span> <!-- Ligne pleine fine -->
            <h1>Victimes de leur succès</h1>
            <span></span> <!-- Ligne pleine fine -->
        </div>
        <div id="product-panels">
            <div class="panel" id="panel1">
                <a href="">
                    <h3>Je découvre</h3>
                </a>
            </div>
            <div class="panel" id="panel2">
                <a href="">
                    <h3>Je découvre</h3>
                </a>
            </div>
            <div id="small-products-panels">
                <div class="panel" id="panel-exotique">
                    <a href="">
                        <h4>Exotique</h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                            viewBox="0 0 256 256">
                            <path
                                d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="panel" id="panel-homme">
                    <a href="">
                        <h4>Homme</h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                            viewBox="0 0 256 256">
                            <path
                                d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="best-site">
        <h1>LE MEILLEUR SITE DE PARFUM</h1>
    </section>

</body>

</html>