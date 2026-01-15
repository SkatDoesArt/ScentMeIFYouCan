<aside id="admin-sidebar">
    <div class="sidebar-header">
        <h3>SMIYC Admin</h3>
    </div>
    <nav>
        <ul>
            <li>
                <a href="<?= base_url('admin/dashboard') ?>" 
                   class="<?= (uri_string() == 'admin/dashboard' || uri_string() == 'admin') ? 'active' : '' ?>">
                   Tableau de bord
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/products') ?>" 
                   class="<?= (strpos(uri_string(), 'admin/products') !== false) ? 'active' : '' ?>">
                   Liste des produits
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/users') ?>" 
                   class="<?= (strpos(uri_string(), 'admin/users') !== false) ? 'active' : '' ?>">
                   Liste des utilisateurs
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/orders') ?>"
                   class="<?= (strpos(uri_string(), 'admin/orders') !== false) ? 'active' : '' ?>">
                    Commandes
                </a>
            </li>
            <!-- <li>
                <a href="<?= base_url('admin/products') ?>"
                   class="<?= (strpos(uri_string(), 'admin/products') !== false) ? 'active' : '' ?>">
                    Stocks
                </a>
            </li> -->
        </ul>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= base_url('logout') ?>" class="logout-link">Déconnexion</a>
    </div>
</aside>