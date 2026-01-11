<?php

namespace App\Service;

use App\Repository\LikeRepository;

class LikeService
{
    private static $likeService = null;
    private $likeRepository;
    private function __construct()
    {
        $this->likeRepository = LikeRepository::getRepository();
    }
    public static function getService()
    {
        if (self::$likeService === null) {
            self::$likeService = new self();
        }
        return self::$likeService;
    }
    public function getAllLike($idArticle)
    {
        return $this->likeRepository->getAllLike($idArticle);
    }
    public function getNumberTotaleLikesByidAuthor($idAuthor)
    {
        return count($this->likeRepository->getTotaleLikesByidAuthor($idAuthor));
    }
    public function getLiksByCommentId($idComment)
    {
        return $this->likeRepository->getLiksByCommentId($idComment);
    }
    public function likeArticle($idArticle, $idUser)
    {
        return $this->likeRepository->addLikeToArticle($idArticle, $idUser);
    }
    public function dislikeArticle($idArticle, $idUser)
    {
        return $this->likeRepository->removeLikeFromArticle($idArticle, $idUser);
    }
    public function likeComment($idComment, $idUser)
    {
        return $this->likeRepository->addLikeToComment($idComment, $idUser);
    }
    public function dislikeComment($idComment, $idUser)
    {
        return $this->likeRepository->removeLikeFromComment($idComment, $idUser);
    }


}