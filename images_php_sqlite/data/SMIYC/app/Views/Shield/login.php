<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?>Connexion<?= $this->endSection() ?>

<?= $this->section('pageStyles') ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/login.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
      .error-feedback {
          color: #ff416c;
          font-size: 0.85em;
          margin-top: -10px;
          margin-bottom: 10px;
          text-align: left;
          width: 100%;
          padding-left: 25px; 
      }
      /* Cache le conteneur Bootstrap vide du layout Shield, si nécessaire */
      .container.d-flex.justify-content-center.p-5 {
          display: none !important;
      }
    </style>
<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
    <script type="text/javascript" src="<?= base_url('js/background.js') ?>" defer></script>
<?= $this->endSection() ?>


<?= $this->section('main') ?>

  <div id="toast-container">
    <?php if (session('error') !== null) : ?>
        <div class="toast error-toast">
            <p><?= esc(session('error')) ?></p>
        </div>
    <?php endif ?>
    
    <?php if (session('message') !== null) : ?>
        <div class="toast success-toast">
            <p><?= esc(session('message')) ?></p>
        </div>
    <?php endif ?>
    
    <?php if (session('errors') !== null && is_array(session('errors'))) : ?>
        <?php foreach (session('errors') as $error) : ?>
            <div class="toast error-toast">
                <p><?= esc($error) ?></p>
            </div>
        <?php endforeach ?>
    <?php endif ?>
  </div>

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
  
  <header id="header">
    <div id="header-container">
      <nav id="nav-upper">
        <div class="retour-arriere">
          <div id="retour-fleche">
            <a href="javascript:history.back()" title="Retour à la page précédente" style="display: block;">
              <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#ffffff" viewBox="0 0 256 256">
                <path
                  d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                </path>
              </svg>
            </a>
          </div>
          <div id="retour">
            <a href="javascript:history.back()" title="Retour à la page précédente">Retour</a>
          </div>
        </div>
        <h1 id="bigname">SMIYC</h1>
      </nav>
    </div>
  </header>

    <div class="main">
        <div class="container b-container" id="b-container">
            <form class="form" id="b-form" method="POST" action="<?= url_to('login') ?>">
                <?= csrf_field() ?>
                
                <h2 class="form_title title">Connexion à votre compte</h2>
                <div class="form__icons"></div>
                <span class="form__span">ou connectez vous avec votre email</span>
                
                <input name="email" class="form__input" type="email" inputmode="email" autocomplete="email" placeholder="Email" value="<?= old('email') ?>" required>
                
                <input name="password" class="form__input" type="password" inputmode="text" autocomplete="current-password" placeholder="Mot de passe" required>

                <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                    <div class="form__group">
                        <input type="checkbox" id="remember" name="remember" class="form__checkbox" 
                            <?php if (old('remember')): ?> checked<?php endif ?>>
                        <label for="remember" class="form__label"><?= lang('Auth.rememberMe') ?></label>
                    </div>
                <?php endif; ?>

                <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                    <a class="form__link" href="<?= url_to('magic-link') ?>">Mot de passe oublié?</a>
                <?php elseif (setting('Auth.allowForgotPassword')) : ?>
                    <a class="form__link" href="<?= url_to('forgot') ?>">Mot de passe oublié?</a>
                <?php else : ?>
                    <span class="form__link">Mot de passe oublié?</span>
                <?php endif ?>

                <button class="form__button button submit">Se connecter</button>

                <p class="form__span" style="margin-top: 20px;">
                    Pas encore de compte ? <a href="<?= "register" ?>" class="form__link" style="border: none;">Inscrivez-vous</a>
                </p>

            </form>
        </div>
    </div>
    
<?= $this->endSection() ?>