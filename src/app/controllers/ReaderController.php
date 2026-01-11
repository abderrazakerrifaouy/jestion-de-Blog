<?php

namespace App\Controllers;

use App\Core\Helper;
use App\Service\ArticleService;
use App\Service\CommentService;
use App\Service\LikeService;
use App\Service\UserService;

class ReaderController
{
    private $articleService;
    private $likesServise;
    private $commentsService;
    private $userService;
    public function __construct()
    {
        $this->articleService = ArticleService::getService();
        $this->likesServise = LikeService::getService();
        $this->commentsService = CommentService::getService();
        $this->userService = UserService::getService();
    }
    public function index()
    {
        $articles = $this->articleService->getAllArticle();
        Helper::view('reader/index', ['articles' => $articles]);
    }
    public function lireArticle()
    {
        $articleId = $_GET['id'];
        $article = $this->articleService->getArticleById($articleId);
        Helper::view('reader/lire_article', ['article' => $article]);
    }

    public function createComent()
    {
        $content = $_POST['content'];
        $articleId = $_POST['article_id'];
        $readerId = $_SESSION['id'];
        if ($this->commentsService->createComment($readerId, $articleId, $content)) {
            header('Location: /lire_article?id=' . $articleId);
        }
    }

    public function likeArticle()
    {
        $articleId = $_POST['idArticle'];
        $readerId = $_SESSION['id'];
        if ($this->likesServise->likeArticle($articleId, $readerId)) {
            header('Location: /lire_article?id=' . $articleId);
        }
    }
    public function dislikeArticle()
    {
        $articleId = $_POST['idArticle'];
        $readerId = $_SESSION['id'];
        if ($this->likesServise->dislikeArticle($articleId, $readerId)) {
            header('Location: /lire_article?id=' . $articleId);
        }
    }
    public function likeComment()
    {
        $commentId = $_POST['idComment'];
        $readerId = $_SESSION['id'];
        if ($this->likesServise->likeComment($commentId, $readerId)) {
            header('Location: /lire_article?id=' . $_POST['article_id']);
        }
    }
    public function dislikeComment()
    {
        $commentId = $_POST['idComment'];
        $readerId = $_SESSION['id'];
        if ($this->likesServise->dislikeComment($commentId, $readerId)) {
            header('Location: /lire_article?id=' . $_POST['article_id']);
        }
    }
    public function afficheArticles()
    {
        $listArticles = $this->articleService->getAllArticle();
        Helper::view('reader/list_article', ['articles' => $listArticles]);
    }
    public function profile()
    {
        $user = $this->userService->getUserById($_SESSION['id']);
        Helper::view('reader/profile', ['user' => $user]);
    }
    public function becomeAuthor()
    {
        $id = $_SESSION['id'];
        $content = $_POST['motivation'];
        if ($this->userService->createUsersWithRoleChangeRequests($id, $content)) {
            header('Location: /');
            exit;
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