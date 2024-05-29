<div class="sidebar-container">
    <div class="sidebar">
        <div class="logo"><?= APP_NAME ?></div>
        <div class="options">
            <ul>
                <?php
                    $options = ['Orders', 'Payments', 'Profile'];
                    $icons = ['orders', 'payments', 'account_circle'];
                    for($i = 0; $i < count($options); $i++){
                        $isActive = $this->active == strtolower($options[$i]) ? 'class="active"' : '';
                        ?>
                            <a href="<?= ROOT ?>/cashier/<?= str_replace(" ", "", strtolower($options[$i])) ?>">
                                <li <?= $isActive ?>>
                                    <span class="material-symbols-outlined"><?= $icons[$i] ?></span>&nbsp;<?= $options[$i] ?>
                                </li>
                            </a>
                        <?php
                    }
                ?>
            </ul>
            <div>
                <hr>
                <ul>
                    <a href="<?= ROOT ?>/cashier/logout">
                        <li>
                            <span class="material-symbols-outlined">logout</span>&nbsp;Log Out
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>