<?php
    class Auth{
        public static function setLogInSession($acc){
            $_SESSION['user'] = $acc;
        }
    
        public static function unsetLogInSession(){
            unset($_SESSION['user']);
        }

        public static function isLoggedIn(){
            if (isset($_SESSION['user'])){
                $data = array(
                    'username' => $_SESSION['user']->username,
                    'password' => $_SESSION['user']->password
                );
                $user = new User();
                $result = $user->where($data);
                if (is_array($result) && count($result) == 1){
                    return true;
                }
            }
            return false;
        }
    
        public static function isAdmin(){
            $result = false;
            if (isset($_SESSION['user']) && $_SESSION['user']->usertype == 'admin'){
                $result = true;
            }
            return $result;
        }
    }