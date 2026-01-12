<?php
// Footer partial used across pages
?>
<footer class="site-footer">
    <div class="footer-top">
        <div class="footer-brand">
            <a href="<?= base_url() ?>" class="brand-link"><strong>SMIYC</strong></a>
            <p class="brand-tag">Le meilleur du parfum en ligne. Livraison rapide • Paiement sécurisé • Retours faciles
            </p>
        </div>

        <div class="footer-links">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="<?= base_url() ?>">Accueil</a></li>
                <li><a href="<?= base_url('catalogue') ?>">Catalogue</a></li>
                <li><a href="<?= base_url('auth/login') ?>">Se connecter</a></li>
                <li><a href="<?= base_url('cart') ?>">Panier</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>Contact</h4>
            <p>Email: <a href="mailto:contact@smi yc.example">contact@smi yc.example</a></p>
            <p>Téléphone: +33 1 23 45 67 89</p>
            <p style="margin-top:.5rem;"><a href="<?= base_url('contact') ?>">Formulaire de contact</a></p>
        </div>

        <div class="footer-newsletter">
            <h4>Newsletter</h4>
            <p>Recevez nos offres et nouveautés.</p>
            <form action="<?= base_url('newsletter/subscribe') ?>" method="post" class="newsletter-form">
                <label for="newsletter-email" class="sr-only">Votre email</label>
                <input id="newsletter-email" type="email" name="email" placeholder="Votre email" required />
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© <?= date('Y') ?> SMIYC — Tous droits réservés. <a href="<?= base_url('mentions') ?>">Mentions légales</a>
        </p>
        <div class="footer-socials">
            <a href="#" aria-label="facebook">Facebook</a>
            <a href="#" aria-label="instagram">Instagram</a>
            <a href="#" aria-label="twitter">Twitter</a>
        </div>
    </div>
</footer>

<style>
    footer {}

    .site-footer {
        background: linear-gradient(180deg, #0b0b0b 0%, #1a1a1a 100%);
        color: #e9e6e0;
        width: 100%;
        padding: 3rem 1rem;
        margin-top: 2rem;
        border-top: 4px solid rgba(255, 255, 255, 0.03);
    }

    .site-footer .footer-top {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        max-width: 1200px;
        margin: 0 auto 2rem auto;
    }

    .site-footer .footer-brand {
        flex: 1 1 260px;
    }

    .site-footer .brand-link {
        font-size: 1.8rem;
        color: #fff;
        text-decoration: none;
    }

    .site-footer .brand-tag {
        color: #cfc8bf;
        margin-top: 0.5rem;
        max-width: 320px;
    }

    .site-footer .footer-links,
    .site-footer .footer-contact,
    .site-footer .footer-newsletter {
        flex: 1 1 200px;
    }

    .site-footer h4 {
        margin: 0 0 0.6rem 0;
        font-size: 1.05rem;
        color: #fff;
    }

    .site-footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .site-footer ul li {
        margin: 0.35rem 0;
    }

    .site-footer a {
        color: #e6dcd1;
        text-decoration: none;
    }

    .site-footer a:hover {
        text-decoration: underline;
    }

    .newsletter-form {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .newsletter-form input[type="email"] {
        padding: 0.6rem 0.8rem;
        border-radius: 6px;
        border: none;
        outline: none;
    }

    .newsletter-form button {
        background: #d9b99f;
        color: #111;
        border: none;
        padding: 0.6rem 0.9rem;
        border-radius: 6px;
        cursor: pointer;
    }

    .site-footer .footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
        padding-top: 1rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .site-footer .footer-socials a {
        margin-left: 0.6rem;
        color: #e6dcd1;
    }
</style>