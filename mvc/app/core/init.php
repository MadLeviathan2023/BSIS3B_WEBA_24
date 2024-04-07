<?php
    require 'config.php';
    require 'functions.php';
    require 'App.php';
    require 'Component.php';
    require 'Controller.php';
    require 'Database.php';
    require 'Model.php';

    spl_autoload_register(function ($class_name){
        $component_file = '../app/components/' . $class_name . '.php';
        $model_file = '../app/models/' . $class_name . '.php';
    
        if (file_exists($component_file)) {
            require $component_file;
        }
        else if (file_exists($model_file)) {
            require $model_file;
        }
    });
    