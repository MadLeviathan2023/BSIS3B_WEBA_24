<nav>
    <div class="nav-contents">
        <div class="logo">
            <a href="<?= ROOT ?>/home"><?= APP_NAME ?></a>
        </div>
        <ul class="options">
            <?php
                $options = array('Menu', 'Cart');
                $icon = array('fa-solid fa-book', 'fa-solid fa-cart-shopping');

                for ($i = 0; $i < count($options); $i++){
                    $isVisible = strtolower($this->visible) == strtolower($options[$i]) ? 'class="visible"' : '';
                    ?>
                        <a href="<?= ROOT . '/' . strtolower(str_replace(' ', '', $options[$i])) ?>" <?= $isVisible ?>>
                            <li>
                                <i class="<?= $icon[$i] ?>"></i> <?= $options[$i] ?>
                            </li>
                        </a>
                    <?php
                }
            ?>        
        </ul>
    </div>
</nav>