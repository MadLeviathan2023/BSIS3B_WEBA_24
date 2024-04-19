<nav>
    <div class="logo">
        <a href="<?= ROOT ?>/home"><?= APP_NAME ?></a>
    </div>
    <ul class="options">
        <?php
            $options = array(
                array('Home', 'Log In'),
                array('home', 'login')
            );
            for ($i = 0; $i < count($options); $i++){
                $isActive = $this->active == $options[1][$i] ? 'active' : '';
                ?>
                    <a href="<?= ROOT . '/' . $options[1][$i] ?>">
                        <li class="<?= $isActive ?>">
                            <?= $options[0][$i] ?>
                        </li>
                    </a>
                <?php
            }
        ?>
    </ul>
</nav>