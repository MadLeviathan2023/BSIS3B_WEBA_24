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