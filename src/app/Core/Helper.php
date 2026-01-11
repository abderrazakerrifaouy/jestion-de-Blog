<?php
namespace App\Core;
class Helper
{ 
    public static function view($view,$data = []){
        extract($data);
        require_once __DIR__ ."./../views/layoute.php";
    }
   
}