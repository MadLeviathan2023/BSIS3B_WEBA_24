<?php
    class Admin extends Controller{
        public function index(){
            $this->view('admin/dashboard');
        }

        public function profile(){
            $this->view('admin/profile');
        }
        
        public function accounts(){
            $this->view('admin/accounts');
        }

        public function products(){
            $this->view('admin/products');
        }

        public function categories(){
            $this->view('admin/categories');
        }

        public function reports(){
            $this->view('admin/reports');
        }

        public function logout(){
            unsetLogInSession();
            redirect('login');            
        }        
    }