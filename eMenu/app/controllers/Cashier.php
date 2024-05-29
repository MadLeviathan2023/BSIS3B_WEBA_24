<?php
    class Cashier extends Controller{
        public function index(){
            $this->orders();
        }

        public function orders(){
            $this->isProceed('orders');
        }

        public function payments(){
            $this->isProceed('payments');
        }

        public function profile(){
            $user = new User();
            $user_id['user_id'] = $_SESSION['user']->user_id;
            $acc = $user->where($user_id);
            $this->isProceed('profile', [
                'user' => $acc[0]
            ]);
        }

        public function logout(){
            Auth::unsetLogInSession();
            redirect('login');
        }

        public function isProceed($page, $data = []){
            if (Auth::isLoggedIn() && Auth::isCashier()){
                $this->view('cashier/' . $page, $data);
            }
            else{
                redirect('login');  
            }
        }
    }