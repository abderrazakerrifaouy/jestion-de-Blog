<?php

namespace App\Controllers;
use App\Core\Helper;
use App\Service\UserService;
use App\Service\ArticleService;
use App\Service\CommentService ;
use App\Service\CategorieService ;

class AdminController
{
    private $userService ;
    private $articleService ;
    private $commentService ;
    private $categorieService ;
    public function __construct(){
        $this->userService = UserService::getService();
        $this->articleService = ArticleService::getService();
        $this->commentService = CommentService::getService();
        $this->categorieService = CategorieService::getService();
    }
    public function index()
    {
        $nUsers =  $this->userService->getMemperUsers();
        $nArticl = $this->articleService->getMemberArticle();
        $ncomments = $this->commentService->getMemberComment();
        $nCategories = $this->categorieService->getMemberCategorie();

        $listArticls = $this->articleService->getAllArticle() ;
        Helper::view('admin/index' , ['users'=>$nUsers , 'articles'=>$nArticl , 'comments'=>$ncomments , 'categories'=>$nCategories , 'listArticls' => $listArticls]);
    }
    public function categories(){
        $categorieService = $this->categorieService->getAllCategory();
        Helper::view('admin/categories', ['categories' => $categorieService]);
    }
    public function createCategorie(){
        $title = $_POST['title'];
        if($this->categorieService->createCategorie($title)){
            header('Location: /categories');
        }
    }
    public function deleteCategorie(){
        $id = $_POST['id'];
        if($this->categorieService->deleteCategorie($id)){
            header('Location: /categories');
        }
    }

    public function adminRoles(){
        $usersRequests = $this->userService->getUsersWithRoleChangeRequests();
        Helper::view('admin/admin_roles', ['usersRequests' => $usersRequests]);
    }
    public function processRoleChange(){
        $idUser = $_POST['id'];
        $action = $_POST['action'];
        if ($action === 'accept') {
            if($this->userService->chengeRoleUser($idUser)){
            header('Location: /admin_roles');
        }
        }else{
            if($this->userService->deleteRoleChangeRequest($idUser)){
            header('Location: /admin_roles');
        }
        }
        
    }
}



