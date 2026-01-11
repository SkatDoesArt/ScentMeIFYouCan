<?php
    $session = session();
    $request = service('request');
    $response = service('response');

    // first-ever persistent visit (cookie)
    $firstEver = !$request->getCookie('smiyc_first_visit');
    if ($firstEver) {
        $response->setCookie('smiyc_first_visit', '1', 60 * 60 * 24 * 365 * 2); // 2 years
    }

    // same browser session (sessionStorage equivalent server-side)
    $sessionActive = $session->has('smiyc_session');
    if (!$sessionActive) {
        $session->set('smiyc_session', '1');
    }

    // referrer heuristic (internal link)
    $referrer = $request->getServer('HTTP_REFERER') ?? '';
    $referrerInternal = false;
    if ($referrer) {
        $p = parse_url($referrer);
        $refHost = $p['host'] ?? '';
        $referrerInternal = $refHost === ($request->getServer('HTTP_HOST') ?? '');
    }

    // conservative server-side guess:
    // true means "user likely came from an internal link or is already in the site"
    $likelyFromLinkOrAlreadyHere = $sessionActive || $referrerInternal;

    // pass to the view; client-side script can refine using performance API
    $data = [
            'likelyFromLinkOrAlreadyHere' => $likelyFromLinkOrAlreadyHere,
            'firstEver' => $firstEver,
    ];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/common.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">

    <!-- FONTS -->
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
    <script type="text/javascript" src="<?php echo base_url(); ?>js/index.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/background.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/reloadPage.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nocap.js" defer></script>

    <title>SMIYC</title>
</head>

<body>

        <!-- part to show on first connexion or page reload -->
        <?php //if (current_url() == base_url().'/#qsdqsdqsd'): ?>
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
                <a id="go-shopping-link" <?php anchor("#accueil") ?>>GO SHOPPING</a>
            </div>
        </div>
    </section>
    <?php //endif ?>
    <!-- END-part to show on first connexion or page reload -->

    <?= view('Pages/partials/header') ?>

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
        <div class="contentOnRight">
            <div class="title">
                <h1>Le meilleur site de parfum</h1>
                <span></span>
            </div>
            <div id="meilleur-icons-div">
                <div class="meilleur-icons">
                    <img src="<?= base_url('pictures/icon/003-arme.png') ?>">
                    <p>
                        Les meilleures senteurs
                    </p>
                </div>
                <div class="meilleur-icons">
                    <img src="<?= base_url('pictures/icon/001-tiquette-de-prix.png') ?>">
                    <p>
                        Les meilleures prix
                    </p>
                </div>
                <div class="meilleur-icons">
                    <img src="<?= base_url('pictures/icon/002-vrifi.png') ?>">
                    <p>
                        Les meilleures qualités
                    </p>
                </div>
            </div>
            <p>
                Le parfum n’a jamais été aussi simple à choisir. <br>
                Avec Scent Me If You Can, explorez, comparez, vibrez. <br>
                Votre odeur, votre style, votre signature.
            </p>
        </div>
    </section>
    <section id="no-cap">
        <div class="title-nocap">
            <span></span>
            <h1>No Cap! C'est du vrai parfum</h1>
            <span></span>
        </div>

        <div style="position: relative; width: 85%; margin: 0 auto; background-color: grey;">

            <div class="carousel">
                <div class="slides">
                    <?php if (!empty($images)): ?>
                        <?php foreach ($images as $img): ?>
                            <div class="slide-item">
                                <img src="<?= $img->getUrl() ?>" alt="<?= $img->getFullTitle() ?>">

                                <div class="info-bandeau">
                                    <div class="text-content">
                                        <a href="<?=base_url()."catalogue/product/".$img->id_produit ?>" class="info-link">
                                            <h3><?= $img->getFullTitle() ?></h3>
                                            <p><?= $img->description ?></p>
                                        </a>
                                    </div>
                                    <button class="add-btn" title="Ajouter au panier">
                                        <a href="/">+</a>
                                        //TODO: Ajouter au panier
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Chargement des parfums...</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="fleche">
                <button id="prev">
                    <svg viewBox="0 0 256 256" width="24" height="24" fill="white">
                        <path
                            d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                        </path>
                    </svg>
                </button>
                <button id="next">
                    <svg viewBox="0 0 256 256" width="24" height="24" fill="white">
                        <path
                            d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <ul class="dots">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $key => $img): ?>
                    <li class="<?= $key === 0 ? 'active' : '' ?>"></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </section>

    <?= view('Pages/partials/footer') ?>

</body>

</html>