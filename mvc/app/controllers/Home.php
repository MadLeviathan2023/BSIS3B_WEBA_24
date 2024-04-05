<?php
    class Home extends Controller{
        public function index(){
            $user = new User();
            $result = $user->delete('2', 'user_id');
            $this->view('home');
        }
    }