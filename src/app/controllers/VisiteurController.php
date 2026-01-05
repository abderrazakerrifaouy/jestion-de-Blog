<?php
namespace App\Controllers;

use App\Core\Helper;
use App\Core\Database;

class VisiteurController
{
    private $db ;
    public function __construct(){
        self::$db = Database::getInstance();
    }
    public function home()
    {
        $query = $this->db->prepare("SELECT * FROM posts");
        $query->execute();
        $posts = $query->fetchAll(\PDO::FETCH_ASSOC);
        Helper::view('visiteur/home', ['posts' => $posts]);
    }

}