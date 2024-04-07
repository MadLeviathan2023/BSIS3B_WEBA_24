<?php

    class Component{
        public function __construct(){
            if (!property_exists($this, 'name')){
                $this->name = strtolower($this::class);
            }
        }

        public function load(){
            $template = '../app/templates/' . strtolower($this->name) . '.php';
            if (file_exists($template)){
                require $template;
            }
            else{
                $template404 = '../app/templates/template404.php';
                if (file_exists($template404)){
                    require $template404;
                }
            }
        }
    }