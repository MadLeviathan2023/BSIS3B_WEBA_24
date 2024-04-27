<nav>
    <div class="nav-contents">
        <div class="logo">
            <a href="<?= ROOT ?>/home"><?= APP_NAME ?></a>
        </div>
        <div class="table-name">
            <h4><?= $this->table_name ?></h4>
        </div>
        <ul class="options">
            <?php
                $options = array('Menu', 'Cart');
                $icon = array('fa-solid fa-book', 'fa-solid fa-cart-shopping');

                for ($i = 0; $i < count($options); $i++){
                    $isActive = strtolower($this->active) == strtolower($options[$i]) ? 'class="active"' : '';
                    ?>
                        <a href="<?= ROOT . '/' . strtolower(str_replace(' ', '', $options[$i])) ?>">
                            <li <?= $isActive ?>>
                                <i class="<?= $icon[$i] ?>"></i> <?= $options[$i] ?>
                            </li>
                        </a>
                    <?php
                }
            ?>        
        </ul>
        <button id="btnMenu"><i class="fa-solid fa-bars"></i></button>
    </div>
</nav>
<script type="text/javascript" src="<?= ROOT ?>/js/menu-nav.js"></script>