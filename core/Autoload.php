


<?php


spl_autoload_register(function ($className) {

    if(file_exists('app/models/' . $className . '.php')){
        require 'app/models/' . $className . '.php';
    }else if(file_exists('core/' . $className . '.php')){
        require 'core/' . $className . '.php';
    }
});