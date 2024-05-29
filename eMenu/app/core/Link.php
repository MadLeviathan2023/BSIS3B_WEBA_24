<?php
    class Link{
        public function logo(){
            ?>
                <link rel="icon" href="<?= ROOT ?>/images/<?= APP_LOGO ?>" type="image/png"/>
            <?php
        }

        public function addStyle($filename){
            if (!empty($filename)){
                ?>
                    <link rel="stylesheet" href="<?= ROOT ?>/css/<?= strtolower($filename) ?>.css"/>
                <?php
            }
        }

        public function fontAwesome(){
            ?>
                <script src="https://kit.fontawesome.com/24b884b4cc.js" crossorigin="anonymous"></script>
            <?php
        }

        public function googleFonts(){
            ?>
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
            <?php
        }
    }