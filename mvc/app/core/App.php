<?php
    class App
    {
        public function __construct()
        {
            echo '<pre>';
            print_r(explode('/', trim($_GET['url'], '/')));
            echo '</pre>';
        }


    }