<?php
    class Get extends Controller{
        public function index(){
            redirect('home');
        }

        public function root(){
            echo ROOT;
        }
    }