<?php
namespace App\Core;

class Router{

    private $routes = [];
    public function get($path , $con , $role_user ){
        $this->routes['GET'][$path][$role_user] = $con;
    }
    public function post($path , $con , $role_user ){
        $this->routes['POST'][$path][$role_user] = $con;
    }
    public function generePath(){
        
         $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
       
         $method = $_SERVER['REQUEST_METHOD'];
         $role_user = $_SESSION['role'] ?? 'visiteur';

        list($controller, $con) = explode('@', $this->routes[$method][$path][$role_user] ?? 'Non_fond_Controller@notFound');

        $class = "App\\Controllers\\$controller";
        $c = new $class();
         
         $c->$con();
         
    }
    
}

 