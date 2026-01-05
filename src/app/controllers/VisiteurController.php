<?php
namespace App\Controllers;

use App\Core\Helper;
class VisiteurController{
    public function home(){
        Helper::view('visiteur/home', []);
    }
}