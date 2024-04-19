<?php
    function show($stuff){
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function redirect($location){
        header("location: ". ROOT ."/$location");
    }