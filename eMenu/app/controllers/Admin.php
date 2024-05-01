<?php
    class Admin extends Controller{
        public function index(){
            $this->isProceed('dashboard');
        }

        public function profile(){
            $this->isProceed('profile');
        }
        
        public function accounts(){
            $user = new User();
            if (isset($_GET['search'])){
                $col = array(
                    0 => "first_name",
                    1 => "' '",
                    2 => "middle_name",
                    3 => "' '",
                    4 => "last_name",
                    5 => "', '",
                    6 => "first_name",
                    7 => "' '",
                    8 => "last_name",
                    9 => "username",
                    10 => "usertype"
                );
                $result = $user->like($col, $_GET['search']);
            }
            else{
                $result = $user->findAll();
            }
            $this->isProceed('accounts', [
                'search' => isset($_GET['search']) ? $_GET['search'] : '',
                'users' => $result
            ]);
        }

        public function add_acc(){
            $this->isProceed('add_acc');
        }

        public function insert_acc(){
            if (count($_POST) > 0){
                $password = $this->generateRandomString();
                $_POST['password'] = md5($password);
                $user_qr = $this->generateRandomString(32);
                $_POST['user_qr'] = $user_qr;

                $msg = 'Hello! ' . $_POST['first_name'] . ',Welcome to eMenu!<br>Username : ' . $_POST['username'] . '<br>Password : ' . $password;
                $mailer = new QRMailer();
                $result = $mailer->send($msg, $user_qr, $_POST['email'], $_POST['first_name']);
                if ($result){
                    $user = new User();
                    $user->insert($_POST);
                    redirect('admin/accounts');
                }
                else{
                    echo $result;
                }
            }
        }

        private function generateRandomString($length = 8){
            $characters = '0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++){
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            return $randomString;
        }

        public function edit_acc($id = ''){
            $data['user_id'] = $id;
            $user = new User();
            $result = $user->where($data);
            if (is_array($result) && count($result) == 1){
                $this->isProceed('edit_acc', [
                    'user' => $result[0]
                ]);
            }
            else{
                redirect('admin/accounts');
            }
        }

        public function update_acc(){
            if (count($_POST) > 0){
                $user = new User();
                $user->update($_POST['user_id'], $_POST, 'user_id');
            }
            redirect('admin/accounts');
        }

        public function delete_acc(){
            if (isLoggedIn() && isAdmin() && count($_POST) == 1){
                $user = new User();
                $result = $user->delete($_POST['user_id'], 'user_id');
                if (!$result){
                    echo 'success';
                }
            }
            else{
                redirect('login');
            }
        }

        public function products(){
            $this->isProceed('products');
        }

        public function categories(){
            $this->isProceed('categories');
        }

        public function reports(){
            $this->isProceed('reports');
        }

        public function logout(){
            unsetLogInSession();
            redirect('login');            
        }
        
        private function isProceed($page, $data = []){
            if (isLoggedIn() && isAdmin()){
                $this->view('admin/' . $page, $data);
            }
            else{
                redirect('login');  
            }
        }
    }