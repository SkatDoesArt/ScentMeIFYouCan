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

<?= view('Pages/partials/background') ?>
  
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