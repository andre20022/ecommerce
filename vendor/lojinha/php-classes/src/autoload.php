<?php

spl_autoload_register(function($className){

    $filename = "vendor".DIRECTORY_SEPARATOR."lojinha".DIRECTORY_SEPARATOR."php-classes".DIRECTORY_SEPARATOR. $className . ".php";

    if(file_exists($filename)){

        require_once $filename;
        
    }

});




