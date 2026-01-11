<?php
namespace App\Service;
use App\Repository\CommentRepository ;

class CommentService{
    private static $CommentService = null;
    private $CommentRepository ;
    private function __construct(){
        $this->CommentRepository = CommentRepository::getRepository();
    }
    public static function getService(){
        if (self::$CommentService === null) {
            self::$CommentService = new self();
        }
        return self::$CommentService ;
    }
    public function getMemberComment(){
        $articlse = $this->CommentRepository->getAllComment();
        return count($articlse);
    }

    public function getNumeperoTotaleCommentsByidAuthor($idAuthor){
        return count( $this->CommentRepository->getCommentByIdAuthor($idAuthor) );
    }
    public function createComment($idReader , $idArticle , $content){
        return $this->CommentRepository->createComment($idReader , $idArticle , $content);
    }
    public function RaporeComment($idComment , $idReader){
        return $this->CommentRepository->RaporeComment($idComment , $idReader);
    }

}