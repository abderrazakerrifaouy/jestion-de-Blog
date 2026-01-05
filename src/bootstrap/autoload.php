<?php

spl_autoload_register(function ($class) {

    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../app/';

 

    $relativeClass = substr($class, strlen($prefix));
    
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    

    if (file_exists($file)) {
        require_once $file;
    }
});

