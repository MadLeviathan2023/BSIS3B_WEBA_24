<div class="sidebar-container">
    <div class="sidebar">
        <div class="logo"><?= APP_NAME ?></div>
        <div class="options">
            <ul>
                <?php
                    $options = ['Dashboard', 'Profile', 'Accounts', 'Products', 'Categories', 'Reports'];
                    $icons = ['dashboard', 'account_circle', 'manage_accounts', 'inventory_2', 'category', 'report'];
                    for($i = 0; $i < count($options); $i++){
                        $isActive = $this->active == strtolower($options[$i]) ? 'class="active"' : '';
                        ?>
                            <a href="<?= ROOT ?>/admin/<?= str_replace(" ", "", strtolower($options[$i])) ?>">
                                <li <?= $isActive ?>>
                                    <span class="material-symbols-outlined"><?= $icons[$i] ?></span>&nbsp;<?= $options[$i] ?>
                                </li>
                            </a>
                        <?php
                    }
                ?>
            </ul>
            <ul>
                <a href="<?= ROOT ?>/admin/logout">
                    <li>
                        <span class="material-symbols-outlined">logout</span>&nbsp;Log Out
                    </li>
                </a>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= ROOT ?>/js/admin-sidebar.js"></script>