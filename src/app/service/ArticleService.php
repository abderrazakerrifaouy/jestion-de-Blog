<?php

namespace App\Service;

use App\Models\Article;
use App\Models\Categorie;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\LikeRepository;
use App\Repository\CommentRepository;
use \App\Models\Comment;

class ArticleService
{
    private static $articleService = null;
    private $articleRepository;
    private $categorieRepository;
    private $likeRepository;
    private $commentsRepository;
    private function __construct()
    {
        $this->articleRepository = ArticleRepository::getRepository();
        $this->categorieRepository = CategorieRepository::getRepository();
        $this->likeRepository = LikeRepository::getRepository();
        $this->commentsRepository = CommentRepository::getRepository();
    }
    public static function getService()
    {
        if (self::$articleService === null) {
            self::$articleService = new self();
        }
        return self::$articleService;
    }
    public function getMemberArticle()
    {
        $articlse = $this->articleRepository->getAllArticle();
        return count($articlse);
    }
    public function getAllArticle()
    {
        $articlse = $this->articleRepository->getAllArticle();

        $allArticle = [];
        foreach ($articlse as $value) {
            $article = new Article(
                $value['id'],
                $value['idAuthor'],
                $value['firstName'],
                $value['tetel'],
                $value['content'],

            );
            $likes = $this->likeRepository->getAllLike($article->getId());
            $article->setLikes(count($likes));
            $listCategory = $this->categorieRepository->getCategorieByuArticleId($article->getId());
            foreach ($listCategory as $cat) {
                $article->addCategory(
                    new Categorie(
                        $cat['id'],
                        $cat['title']
                    )
                );
            }
            $allArticle[] = $article;
        }
        return $allArticle;
    }
    public function createArticle($idAuthor, $content, $title, $listCategory)
    {

        $id = $this->articleRepository->createArticle($idAuthor, $content, $title);
        $this->categorieRepository->create_article_category($id, $listCategory);

        if ($id) {
            return true;
        }
        return false;
    }
    public function getArticleByAuthorId($authorId)
    {
        $articlse = $this->articleRepository->getArticleByAuthorId($authorId);
        $allArticle = [];
        foreach ($articlse as $value) {
            $article = new Article(
                $value['id'],
                $value['idAuthor'],
                $value['firstName'],
                $value['tetel'],
                $value['content'],

            );

            $category = $this->categorieRepository->getCategorieByuArticleId($article->getId());
            foreach ($category as $cat) {
                $article->addCategory(
                    new Categorie(
                        $cat['id'],
                        $cat['title']
                    )
                );
            }
            $comments = $this->commentsRepository->getCommentsByArticleId($article->getId());
            foreach ($comments as $comment) {
                  $comm =   new Comment(
                        $comment['id'],
                        $comment['idReader'],
                        $comment['idArticle'],
                        $comment['content'],
                        $comment['nameReader']
                    ) ;

                $likes = $this->likeRepository->getLiksByCommentId($comm->getId());
                $comm->setLikses(count($likes));
                $comm->setIsLikedByCurrentUser($this->likeRepository->isCommentLikedByUser($comm->getId(), $_SESSION['id']));
                $article->addComment($comm);
            }
            $likeArticle = $this->likeRepository->getAllLike($article->getId());
            $article->setLikes(count($likeArticle));
            $allArticle[] = $article;
        }
        return $allArticle;
    }
    public function getTotalArticlesCount()
    {
        $articles = $this->articleRepository->getAllArticle();
        return count($articles);
    }
    public function deleteArticle($articleId)
    {
        $this->articleRepository->deleteArticle($articleId);
    }
    public function getArticleById($articleId)
    {
        $articleData = $this->articleRepository->getArticleById($articleId);
        $article = new Article(
            $articleData['id'],
            $articleData['idAuthor'],
            $articleData['firstName'],
            $articleData['tetel'],
            $articleData['content'],

        );

        $category = $this->categorieRepository->getCategorieByuArticleId($article->getId());
        foreach ($category as $cat) {
            $article->addCategory(
                new Categorie(
                    $cat['id'],
                    $cat['title']
                )
            );
        }
        $comments = $this->commentsRepository->getCommentsByArticleId($article->getId());
        foreach ($comments as $comment) {   
                 
              $com = new Comment(
                    $comment['id'],
                    $comment['idReader'],
                    $comment['idArticle'],
                    $comment['content'] ,
                    $comment['nameReader']
                );
                $likes = count($this->likeRepository->getLiksByCommentId($com->getId()));
                
                $com->setLikses($likes);
                $com->setIsLikedByCurrentUser($this->likeRepository->isCommentLikedByUser($com->getId(), $_SESSION['id']));
                $article->addComment($com);
        }
        $likeArticle = $this->likeRepository->getAllLike($article->getId());
        $article->setLikes(count($likeArticle));
        $isLiked = $this->likeRepository->isArticleLikedByUser($article->getId(), $_SESSION['id']);
        $article->setIsLikedByCurrentUser($isLiked);
        return $article;
    }
}
