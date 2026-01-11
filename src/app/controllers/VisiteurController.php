<?php

namespace App\Controllers;

use App\Core\Helper;
use App\Service\ArticleService;
use App\Service\UserService;

class VisiteurController
{
    private $userService;
    private $articleService;
    public function __construct()
    {
        $this->userService = UserService::getService();
        $this->articleService = ArticleService::getService();
    }
    public function home()
    {
        $articles = $this->articleService->getAllArticle();
        Helper::view('visiteur/home', ['articles' => $articles]);
    }
    public function showRegistrationForm()
    {
        Helper::view('visiteur/register');
    }
    public function showLoginForm()
    {
        Helper::view('visiteur/login');
    }
    public function register()
    {
        $firstName = $_POST['firstName'];
        $lastName  = $_POST['lastName'];
        $email     = $_POST['email'];
        $password  = $_POST['pass'];
        $validePassword = $_POST['passValide'];

        $result = $this->userService->register(
            $firstName,
            $lastName,
            $email,
            $password,
            $validePassword
        );

        if ($result) {
            header("Location: /login");
            exit;
        } else {
            echo "Registration failed. Please try again.";
        }
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $result = $this->userService->login($email, $password);
        
        if ($result) {
            header("Location: /");
            exit;
        }else {
            echo "Login failed. Please check your credentials and try again.";
        }
    }
    public function logout(){
        $this->userService->logAout() ;
        header('Location: /');
    }

}
