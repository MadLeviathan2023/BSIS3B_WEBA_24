<?php
    class Login extends Controller{
        public function index(){
            $this->view('login');
        }

        public function failed(){
            $this->view('login');
        }

        public function auth(){
            if (isset($_POST['btnLogIn'])){
                $data = array(
                    'username' => $_POST['txtUsername'],
                    'password' => md5($_POST['txtPassword'])
                );
                $user = new User();
                $result = $user->where($data);
                if (is_array($result) && count($result) === 1){
                    $account = $result[0];
                    if ($account->usertype == 'admin'){
                        redirect(PATH . '/admin');
                    }
                    else if ($account->usertype == 'user'){
                        redirect(PATH . '/user');
                    }
                }
                else{
                    redirect(PATH . '/login/failed');
                }
            }
        }
    }