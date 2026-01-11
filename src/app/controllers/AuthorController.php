<?php

namespace App\Controllers;

use App\Core\Helper;
use App\Service\ArticleService;
use App\Service\CategorieService;
use App\Service\CommentService;
use App\Service\LikeService;

class AuthorController{
    private $categorieService ;
    private $articleService ;
    private $likesServise ;
    private $commentsService ;
    public function __construct(){
        $this->categorieService = CategorieService::getService();
        $this->articleService = ArticleService::getService();
        $this->likesServise = LikeService::getService();
        $this->commentsService = CommentService::getService();
    }
    public function index(){
        $countArticles = count($this->articleService->getArticleByAuthorId($_SESSION['id']));
        $coutLIkes = $this->likesServise->getNumberTotaleLikesByidAuthor($_SESSION['id']);
        $countComments = $this->commentsService->getNumeperoTotaleCommentsByidAuthor($_SESSION['id']);
        $articles = $this->articleService->getArticleByAuthorId($_SESSION['id']);
        Helper::view('author/index' , [
            'countArticles' => $countArticles ,
            'countLikes' => $coutLIkes ,
            'countComments' => $countComments ,
            'articles' => $articles
        ]);
    }
    public function createArticle(){
        $listCategoty = $this->categorieService->getAllCategory();
        Helper::view('author/create_article' , ['categories'=> $listCategoty]);
    }
    public function storeArticle(){
        $idAuthor = $_SESSION['id'];
        $content = $_POST['content'];
        $title = $_POST['title'];
        $listCategoty = $_POST['categories'];
        if($this->articleService->createArticle($idAuthor , $content , $title , $listCategoty)){
            header('Location: /');
        }
        
    }
    public function deleteArticle(){
        $articleId = $_GET['id'];
        $this->articleService->deleteArticle($articleId);
        header('Location: /');
    }
    public function aficheArticle(){
        $articleId = $_GET['id'];
        $article = $this->articleService->getArticleById($articleId);
        Helper::view('author/afiche_article' , ['article' => $article]);
    }
    public function afficheArticles(){
        $listArticles = $this->articleService->getAllArticle();
        Helper::view('author/list_article' , ['articles' => $listArticles]);
    }
    public function lireArticle(){
        $articleId = $_GET['id'];
        $article = $this->articleService->getArticleById($articleId);
        Helper::view('author/lire_article' , ['article' => $article]);
    }

    public function createComent(){
        $content = $_POST['content'];
        $articleId = $_POST['article_id'];
        $readerId = $_SESSION['id'];
        if($this->commentsService->createComment($readerId , $articleId , $content)){
            header('Location: /lire_article?id=' . $articleId);
        }
    }

    public function likeArticle(){
        $articleId = $_POST['idArticle'];
        $readerId = $_SESSION['id'];
        if($this->likesServise->likeArticle($articleId , $readerId )){
            header('Location: /lire_article?id=' . $articleId);
        }
    }
    public function dislikeArticle(){
        $articleId = $_POST['idArticle'];
        $readerId = $_SESSION['id'];
        if($this->likesServise->dislikeArticle($articleId , $readerId )){
            header('Location: /lire_article?id=' . $articleId);
        }
    }
    public function likeComment(){
        $commentId = $_POST['idComment'];
        $readerId = $_SESSION['id'];
        if($this->likesServise->likeComment($commentId , $readerId )){
            header('Location: /lire_article?id=' . $_POST['article_id']);
        }
    }
    public function dislikeComment(){
        $commentId = $_POST['idComment'];
        $readerId = $_SESSION['id'];
        if($this->likesServise->dislikeComment($commentId , $readerId )){
            header('Location: /lire_article?id=' . $_POST['article_id']);
        }
    }

    public function raporeComment()
    {
        $commentId = $_POST['idComment'];
        $readerId = $_SESSION['id'];
        if ($this->commentsService->RaporeComment($commentId , $readerId)) {
            header('Location: / ');
        }
    }
}   