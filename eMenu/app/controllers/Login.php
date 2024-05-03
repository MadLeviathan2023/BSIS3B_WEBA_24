<?php
    class Login extends Controller{
        public function index(){
            if (!Auth::isLoggedIn()){
                $this->view('login', [
                    'err' => []
                ]);
            }
            else{
                $usertype = $_SESSION['user']->usertype;
                if ($usertype == 'admin'){
                    redirect('admin');
                }
                else if ($usertype == 'user'){
                    redirect('user');
                }
            }
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
                    Auth::setLogInSession($account);

                    if ($account->usertype == 'admin'){
                        redirect('admin');
                    }
                    else if ($account->usertype == 'user'){
                        redirect('user');
                    }
                }
                else{
                    $user->errors['login'] = 'Invalid Log In!';
                    $this->view('login', [
                        'err' => $user->errors
                    ]);
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
                    $result = $user->where($_POST);
                    if (is_array($result) && count($result) === 1){   
                        $account = $result[0];                 
                        Auth::setLogInSession($account);

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
    }