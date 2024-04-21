<?php
    class Menu extends Controller{
        public function index(){
            redirect('home');
        }

        public function table($tbl_code = ''){
            $table = new Table();
            $data['table_code'] = $tbl_code;
            $result = $table->where($data);
            if (is_array($result) && count($result) == 1){
                $this->view('menu');
            }
            else{
                redirect('home');
            }
        }
    }