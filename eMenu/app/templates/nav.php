<nav>
    <div class="logo">
        <a href="<?= ROOT ?>/home"><?= APP_NAME ?></a>
    </div>
    <ul class="options">
        <?php
            $options = array('Home', 'Log In');

            for ($i = 0; $i < count($options); $i++){
                $isActive = strtolower($this->active) == strtolower($options[$i]) ? 'class="active"' : '';
                ?>
                    <a href="<?= ROOT . '/' . strtolower(str_replace(' ', '',$options[$i])) ?>">
                        <li <?= $isActive ?>>
                            <?= $options[$i] ?>
                        </li>
                    </a>
                <?php
            }
        ?>
    </ul>
</nav>