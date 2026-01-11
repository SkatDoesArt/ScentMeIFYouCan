<?php
// Footer partial used across pages
?>
<footer id="site-footer" style="padding:1.5rem;background:#f5f5f5;border-top:1px solid #e1e1e1;margin-top:2rem;">
    <div style="max-width:1100px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;">
        <div>
            <strong>SMIYC</strong>
            <p style="margin:0.25rem 0;color:#666;">Le meilleur du parfum en ligne.</p>
        </div>
        <nav aria-label="footer-links">
            <a href="<?= base_url() ?>" style="margin-right:1rem;color:#333;text-decoration:none;">Accueil</a>
            <a href="<?= base_url() ?>catalogue" style="margin-right:1rem;color:#333;text-decoration:none;">Catalogue</a>
            <a href="<?= base_url() ?>auth/login" style="margin-right:1rem;color:#333;text-decoration:none;">Se connecter</a>
            <a href="<?= base_url() ?>cart" style="color:#333;text-decoration:none;">Panier</a>
        </nav>
    </div>
</footer>

