<?php
    class Menu extends Controller{
        public function index(){
            if (isset($_SESSION['table_code'])){
                redirect('menu/table');
            }
            else{
                redirect('home');
            }
        }

        public function table($tbl_code = ''){
            if(isset($_SESSION['table_code']) && empty($tbl_code)){
                $data['table_code'] = $_SESSION['table_code'];
            }
            else{
                $data['table_code'] = $tbl_code;
            }

            $table = new Table();
            $tblResult = $table->where($data);
            $product = new Product();
            $prdctResult = $product->findAll();

            if (is_array($tblResult) && count($tblResult) == 1){
                $_SESSION['table_code'] = $tblResult[0]->table_code;
                $this->view('menu', [
                    'table' => $tblResult[0],
                    'product' => $prdctResult
                ]);
            }
            else{
                redirect('home');
            }
        }

        public function search(){
            if (isset($_SESSION['table_code'])){            
                if (count($_GET) > 0){
                    $data['table_code'] = $_SESSION['table_code'];
                    $table = new Table();
                    $tblResult = $table->where($data);
                    $product = new Product();
                    $prdctResult = $product->search($_GET['category'], $_GET['search']);
                    $this->view('menu', [
                        'table' => $tblResult[0],
                        'product' => $prdctResult
                    ]);
                }
                else{
                    redirect('menu/table');
                }
            }
            else{
                redirect('home');
            }
        }
    }