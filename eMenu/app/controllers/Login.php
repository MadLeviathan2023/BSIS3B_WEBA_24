<?php
    class Login extends Controller{
        public function index(){
            if (!isLoggedIn()){
                $this->view('login');
            }
            else{
                $usertype = $_SESSION['usertype'];
                if ($usertype == 'admin'){
                    redirect('admin');
                }
                else if ($usertype == 'user'){
                    redirect('user');
                }
            }
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
                    $this->setLogInSession($account->username, $account->password, $account->usertype);

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
            else{
                redirect('login');
            }
        }

        public function auth_qr(){  
            $authResult;
            try{
                if (isset($_POST['user_qr'])){
                    $user = new User();
                    $_POST['user_qr'] = $_POST['user_qr'];
                    $result = $user->where($_POST);
                    if (is_array($result) && count($result) === 1){   
                        $account = $result[0];                 
                        $this->setLogInSession($account->username, $account->password, $account->usertype);

                        $authResult = array(
                            'status' => 'success',
                            'usertype' => $account->usertype
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
                else{
                    redirect('login');
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

        private function setLogInSession($username, $password, $usertype){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['usertype'] = $usertype;
        }
    }