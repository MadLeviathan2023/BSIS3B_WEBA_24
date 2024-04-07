<?php
    class Link{
        public function logo(){
            ?>
                <link rel="icon" href="images/<?= APP_LOGO ?>" type="image/png"/>
            <?php
        }

        public function addStyle($filename){
            ?>
                <link rel="stylesheet" href="css/<?= strtolower($filename) ?>.css"/>
            <?php
        }

        public function cdnjs(){
            ?>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
            <?php
        }
    }