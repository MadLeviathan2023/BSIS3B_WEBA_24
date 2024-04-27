<?php
    class Menu extends Controller{
        public function index(){
            session_start();

            if (isset($_SESSION['table_code'])){
                redirect('menu/table');
            }
            else{
                redirect('home');
            }
        }

        public function table($tbl_code = ''){
            session_start();

            if(isset($_SESSION['table_code'])){
                $data['table_code'] = $_SESSION['table_code'];
            }
            else{
                $data['table_code'] = $tbl_code;
            }

            $table = new Table();
            $result = $table->where($data);
            if (is_array($result) && count($result) == 1){
                $_SESSION['table_code'] = $result[0]->table_code;
                $this->view('menu/index', [
                    'table' => $result[0]
                ]);
            }
            else{
                redirect('home');
            }
        }

        public function search(){
            session_start();

            if (isset($_SESSION['table_code'])){
                if (count($_POST) > 0){
                    
                }
            }
            else{
                redirect('home');
            }
        }
    }