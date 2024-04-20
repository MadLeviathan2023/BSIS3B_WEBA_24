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
                        redirect('admin');
                    }
                    else if ($account->usertype == 'user'){
                        redirect('user');
                    }
                }
                else{
                    redirect('login/failed');
                }
            }
        }

        public function auth_qr(){  
            $authResult;
            try{
                if (isset($_POST['user_qr'])){
                    $user = new User();
                    $_POST['user_qr'] = md5($_POST['user_qr']);
                    $result = $user->where($_POST);
                    if (is_array($result) && count($result) === 1){
                        //Set Session code here(Not done yet)

                        $authResult = array(
                            'status' => 'success',
                            'usertype' => $result[0]->usertype
                        );
                    }
                    else{
                        $authResult = array(
                            'msg' => 'Invalid QR Code!',
                            'caption' => 'Failed!',
                            'status' => 'failed'
                        );
                    }
                }
            }
            catch(Exception $ex){
                $authResult = array(
                    'msg' => $ex->getMessage(),
                    'caption', 'Error!',
                    'status', 'failed'
                );
            }
            finally{
                if (is_array($authResult)){
                    echo json_encode($authResult);
                }
                else{
                    redirect('login');
                }
            }
        }
    }