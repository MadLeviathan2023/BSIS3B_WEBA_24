<?php
    use BaconQrCode\Renderer\ImageRenderer;
    use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
    use BaconQrCode\Renderer\RendererStyle\RendererStyle;
    use BaconQrCode\Writer;

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
            $renderer = new ImageRenderer(
                new RendererStyle(400),
                new ImagickImageBackEnd()
            );
            $writer = new Writer($renderer);
            $writer->writeFile('Hello World!', 'qrcode.png');
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