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
        if (!isSessionStarted()){
            session_start();
        }
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

    function isAdmin(){
        if (!isSessionStarted()){
            session_start();
        }
        $result = false;
        if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
            $result = true;
        }
        return $result;
    }

    function isSessionStarted(){
        return session_status() == PHP_SESSION_ACTIVE ? true : false;
    }

    function unsetLogInSession(){
        if (!isSessionStarted()){
            session_start();
        }
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['usertype']);
    }