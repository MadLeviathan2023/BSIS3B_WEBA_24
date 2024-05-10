<?php
    function show($stuff){
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function redirect($location){
        header("location: ". ROOT ."/$location");
    }

    function get_post($key){
        if (isset($_POST[$key])){
            echo $_POST[$key];
        }
    }

    function showError($errors = []){
        if (is_array($errors) && count($errors) > 0){
            echo '<div class="error-display">';
            foreach($errors as $error){
                echo '<div>' . $error . '</div>';
            }
            echo '</div>';
        }
    }

    function generateRandomString($length = 8){
        $characters = '0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++){
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    function deleteFolderAndContents($dir){
        if (is_dir($dir)){
            $objects = scandir($dir);
            foreach($objects as $object){
                if ($object != "." && $object != ".."){
                    if (filetype($dir . "/" . $object) == "dir"){
                        deleteFolderAndContents($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            reset($objects);
            if (!rmdir($dir)){
                echo 'Could not delete existing content, please ensure no other programs or utilities are accessing the folder or contents - ' . $dir;
            }
        }
    }

    function decimalFormat($number, $decimals = 0){
        return number_format($number, $decimals, '.', ',');
    }