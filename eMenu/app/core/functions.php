<?php
    function show($stuff){
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function redirect($location){
        header("location: ". ROOT ."/$location");
    }

    function isLoggedIn(){
        session_start();
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            $data = array(
                'username' => $_SESSION['username'],
                'password' => $_SESSION['password']
            );
            $user = new User();
            $result = $user->where($data);
            if (is_array($result) && count($result) == 1){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    function unsetLogInSession(){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['usertype']);
    }