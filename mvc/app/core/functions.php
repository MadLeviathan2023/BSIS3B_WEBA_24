<?php
    function show($stuff){
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function datenow(){
        $datetime = new DateTime();
        $datetime->setTimeZone(new DateTimeZone('Asia/Manila'));
        return $datetime;
    }