<?php
    class Admin extends Controller{
        public function index(){
            $this->dashboard();
        }

        public function dashboard(){
            $this->isProceed('dashboard');
        }

        public function profile(){
            $this->isProceed('profile');
        }
        
        public function accounts(){
            $user = new User();
            if (isset($_GET['search'])){
                $col = ["first_name", "' '", "middle_name", "' '", "last_name", "', '", "first_name", "' '", "last_name", "username", "usertype"];
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
            $this->isProceed('add_acc', [
                'err' => []
            ]);
        }

        public function insert_acc(){
            if (count($_POST) > 0){
                $password = generateRandomString();
                $_POST['password'] = md5($password);

                $user = new User();
                if ($user->isValid($_POST)){
                    $code['user_qr'] = generateRandomString(32);
                    $isQrExists = $user->where($code);
                    while (is_array($isQrExists) && count($isQrExists) > 0){
                        $code['user_qr'] = generateRandomString(32);
                        $isQrExists = $user->where($code);
                    }
                    $_POST['user_qr'] = $code['user_qr'];

                    $msg = 'Hello! ' . $_POST['first_name'] . ', Welcome to eMenu!<br>Username : ' . $_POST['username'] . '<br>Password : ' . $password;
                    $mailer = new QRMailer();
                    $result = $mailer->send($msg, $code['user_qr'], $_POST['email'], $_POST['first_name']);
                    if ($result){
                        $user->insert($_POST);
                        redirect('admin/accounts');
                    }
                    else{
                        $user->errors['error'] = 'Something went wrong!';
                        $this->isProceed('add_acc', [
                            'err' => $user->errors
                        ]);
                    }
                }
                else{
                    $this->isProceed('add_acc', [
                        'err' => $user->errors
                    ]);
                }
            }
            else{
                redirect('admin/accounts');
            }
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
            if (Auth::isLoggedIn() && Auth::isAdmin() && count($_POST) == 1){
                try{
                    $user = new User();
                    $result = $user->delete($_POST['user_id'], 'user_id');
                    echo 'success';
                }
                catch(Exception $ex){
                    echo $ex->getMessage();
                }
            }
            else{
                redirect('login');
            }
        }

        public function tables(){
            $table = new Table();
            if (isset($_GET['search'])){
                $col = ["table_name", "table_status"];
                $result = $table->like($col, $_GET['search']);
            }
            else{
                $result = $table->findAll();
            }
            $this->isProceed('tables', [
                'search' => isset($_GET['search']) ? $_GET['search'] : '',
                'tables' => $result
            ]);
        }

        public function download_tbl_qr($tbl_id){
            try{
                if (Auth::isLoggedIn() && Auth::isAdmin()){
                    $table = new Table();
                    $data['table_id'] = $tbl_id;
                    $result = $table->where($data);
                    $tbl_url = ROOT . '/menu/table/' . $result[0]->table_code;
                    $filename = str_replace(" ", "_", $result[0]->table_name . ".png");

                    $qr = new QrGenerator();
                    $qr->download($tbl_url, $filename);
                }
                redirect('admin/tables');
            }
            catch (Exception $ex){
                echo $ex->getMessage();
            }
        }

        public function add_tbl(){
            $this->isProceed('add_tbl', [
                'err' => []
            ]);
        }

        public function insert_tbl(){
            $table = new Table();
            if (count($_POST) > 0){                
                if ($table->isExists($_POST, 'table_name')){
                    $table->errors['table'] = 'Table Name already exists!';

                    $this->isProceed('add_tbl', [
                        'err' => $table->errors
                    ]);
                }
                else{
                    $data = $_POST;
                    $tbl_code['table_code'] = generateRandomString(32);
                    $isExists = $table->where($tbl_code);
                    while (is_array($isExists) && count($isExists) > 0){
                        $tbl_code['table_code'] = generateRandomString(32);
                        $isExists = $table->where($tbl_code);
                    }
                    $data['table_code'] = $tbl_code['table_code'];
                    $table->insert($data);
                    redirect('admin/tables');
                }
            }
        }

        public function edit_tbl($id){
            $data['table_id'] = $id;
            $table = new Table();
            $result = $table->where($data);
            if (is_array($result) && count($result) == 1){
                $this->isProceed('edit_tbl', [
                    'table' => $result[0],
                    'err' => []
                ]);
            }
            else{
                redirect('admin/tables');
            }
        }

        public function update_tbl(){
            if (count($_POST) > 0){
                $table = new Table();
                $table->update($_POST['table_id'], $_POST, 'table_id');
            }
            redirect('admin/tables');
        }

        public function delete_tbl(){
            if (Auth::isLoggedIn() && Auth::isAdmin() && count($_POST) == 1){
                try{
                    $table = new Table();
                    $table->delete($_POST['table_id'], 'table_id');
                    echo 'success';
                }
                catch(Exception $ex){
                    echo $ex->getMessage();
                }
            }
            else{
                redirect('login');
            }
        }

        public function products(){
            $product = new Product();
            if (isset($_GET['search'])){
                $col = array(
                    0 => "product_category",
                    1 => "': '",
                    2 => "product_name",
                );
                $result = $product->like($col, $_GET['search']);
            }
            else{
                $result = $product->findAll();
            }
            $this->isProceed('products', [
                'search' => isset($_GET['search']) ? $_GET['search'] : '',
                'products' => $result
            ]);
        }

        public function add_prdct(){
            $category = new Category();
            $categories = $category->findAll();
            $this->isProceed('add_prdct', [
                'categories' => $categories,
                'err' => []
            ]);
        }

        public function displayProductImg($filepath){
            if (!str_ends_with($filepath, '/') && !empty($filepath)){
                echo ROOT . '/uploads/product_img/' . $filepath;
            } else {
                echo ROOT . '/images/no-image.png';
            }
        }

        public function insert_prdct(){
            if (count($_POST) > 0){
                $category = new Category();
                $ctgry_id['category_id'] = $_POST['category_id'];
                $ctgry = $category->where($ctgry_id);
                
                $data = $_POST;
                $data['product_img'] = basename($_FILES['product_img']['name']);
                $data['product_category'] = $ctgry[0]->category_name;
                $data['product_status'] = 'available';

                $product = new Product();
                $product->insert($data);
                $dir = 'uploads/product_img/' . $product->lastId;
                if (!is_dir($dir)){
                    mkdir($dir);
                }
                
                if (!empty($data['product_img'])){
                    $filepath = $dir . '/' . $data['product_img'];
                    $tmp_name = $_FILES['product_img']['tmp_name'];
                    $uploadResult = move_uploaded_file($tmp_name, $filepath);
                    if (!$uploadResult){
                        $product->errors['product_img'] = 'Inserted but failed to upload the image!';
                    }
                }

                if (count($product->errors) > 0){
                    $categories = $category->findAll();
                    $this->isProceed('add_prdct', [
                        'categories' => $categories,
                        'err' => $product->errors
                    ]);
                }
                else{
                    redirect('admin/products');
                }
            }
            else{
                redirect('admin/products');
            }
        }

        public function edit_prdct($id){
            $product = new Product();
            $data['product_id'] = $id;
            $prdct = $product->where($data);


            $category = new Category();
            $categories = $category->findAll();
            $this->isProceed('edit_prdct', [
                'product' => $prdct[0],
                'categories' => $categories,
                'err' => []
            ]);
        }

        public function update_prdct(){
            if (count($_POST) > 0){
                $category = new Category();
                $ctgry_id['category_id'] = $_POST['category_id'];
                $ctgry = $category->where($ctgry_id);
                
                $data = $_POST;
                $data['product_category'] = $ctgry[0]->category_name;

                $product = new Product();
                $prdct_id['product_id'] = $data['product_id'];
                $oldData = $product->where($prdct_id);
                if (!empty($_FILES['product_img']['name'])){
                    $data['product_img'] = basename($_FILES['product_img']['name']);
                }

                $product->update($data['product_id'] , $data, 'product_id');
                $dir = 'uploads/product_img/' . $data['product_id'];
                if (!is_dir($dir)){
                    mkdir($dir);
                }
                
                if (!empty($data['product_img'])){
                    $oldFile = $dir . '/' . $oldData[0]->product_img;
                    if (file_exists($oldFile)){
                        unlink($oldFile);
                    }

                    $filepath = $dir . '/' . $data['product_img'];
                    $tmp_name = $_FILES['product_img']['tmp_name'];
                    $uploadResult = move_uploaded_file($tmp_name, $filepath);
                    if (!$uploadResult){
                        $product->errors['product_img'] = 'Inserted but failed to upload the image!';
                    }
                }

                if (count($product->errors) > 0){
                    $updatedData = $product->where($product_id);
                    $categories = $category->findAll();

                    $this->isProceed('update_prdct', [
                        'product' => $updatedData[0],
                        'categories' => $categories,
                        'err' => $product->errors
                    ]);
                }
                else{
                    redirect('admin/products');
                }
            }
            else{
                redirect('admin/products');
            }
        }

        public function delete_prdct(){
            if (Auth::isLoggedIn() && Auth::isAdmin() && count($_POST) == 1){
                try{
                    $product = new Product();
                    $result = $product->delete($_POST['product_id'], 'product_id');
                    $dir = 'uploads/product_img/' . $_POST['product_id'];
                    deleteFolderAndContents($dir);
                    echo 'success';
                }
                catch(Exception $ex){
                    echo $ex->getMessage();
                }
            }
            else{
                redirect('login');
            }
        }

        public function categories(){
            $category = new Category();
            if (isset($_GET['search'])){
                $col = array(
                    0 => 'category_name'
                );
                $result = $category->like($col, $_GET['search']);
            }
            else{
                $result = $category->findAll();
            }
            $this->isProceed('categories', [
                'categories' => $result
            ]);
        }

        public function add_ctgry(){
            $this->isProceed('add_ctgry', [
                'err' => []
            ]);
        }

        public function insert_ctgry(){
            $category = new Category();
            if (count($_POST) > 0){                
                if ($category->isExists($_POST, 'category_name')){
                    $category->errors['category'] = 'Category Name already exists!';

                    $this->isProceed('add_ctgry', [
                        'err' => $category->errors
                    ]);
                }
                else{
                    $category->insert($_POST);
                    redirect('admin/categories');
                }
            }
        }

        public function edit_ctgry($id){
            $category = new Category();
            $data['category_id'] = $id;
            $result = $category->where($data);
            $this->isProceed('edit_ctgry', [
                'category' => $result[0],
                'id' => $id,
                'err' => []
            ]);
        }

        public function update_ctgry(){
            $category = new Category();
            if (count($_POST) > 0){
                if ($category->isExists($_POST, 'category_name')){
                    $category->errors['category'] = 'Category Name already exists!';
                }
                else{
                    $category->update($_POST['category_id'], $_POST, 'category_id');
                    redirect('admin/categories');
                }
            }
            $this->isProceed('edit_ctgry', [
                'err' => $category->errors
            ]);
        }

        public function delete_ctgry(){
            if (Auth::isLoggedIn() && Auth::isAdmin() && count($_POST) == 1){
                try{
                    $category = new Category();
                    $result = $category->delete($_POST['category_id'], 'category_id');
                    echo 'success';
                }
                catch(Exception $ex){
                    echo $ex->getMessage();
                }
            }
            else{
                redirect('login');
            }
        }

        public function reports(){
            $this->isProceed('reports');
        }

        public function logout(){
            Auth::unsetLogInSession();
            redirect('login');            
        }
        
        private function isProceed($page, $data = []){
            if (Auth::isLoggedIn() && Auth::isAdmin()){
                $this->view('admin/' . $page, $data);
            }
            else{
                redirect('login');  
            }
        }
    }