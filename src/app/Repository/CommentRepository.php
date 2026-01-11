<?php
namespace App\Repository;
use App\Core\Database;

class CommentRepository{
    private $pdo ;
    private static $CommentRepository ;
    private function __construct(){
        $this->pdo = Database::getInstance();
    }
    public static function getRepository(){
        if (self::$CommentRepository === null) {
            self::$CommentRepository = new self();
        }
        return self::$CommentRepository ;
    }

    public function getAllComment()
    {
        $sql = "SELECT * , users.firstName as nameReader FROM comments 
        join users on users.id = comments.idReader";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $comments = $stmt->fetchAll();
        return $comments;
    }
    public function getCommentByIdAuthor($idAuthor)
    {
        $sql = "SELECT * , users.firstName as nameReader FROM comments 
        join articles on articles.id = comments.idArticle
        join users on users.id = comments.idReader
        where articles.idAuthor = :idAuthor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idAuthor', $idAuthor);
        $stmt->execute();
        $comments = $stmt->fetchAll();
        return $comments;
    }
    public function getCommentsByArticleId($articleId)
    {
        $sql = "SELECT c.* , users.firstName as nameReader FROM comments c
        join users on users.id = c.idReader
        where c.idArticle = :articleId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->execute();
        $comments = $stmt->fetchAll();
        return $comments;
    }
    public function createComment($idReader , $idArticle , $content){
        $sql = "INSERT INTO comments (idReader , idArticle , content) VALUES (:idReader , :idArticle , :content)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idReader' , $idReader);
        $stmt->bindParam(':idArticle' , $idArticle);
        $stmt->bindParam(':content' , $content);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


    public function RaporeComment($idComment , $idReader)
    {
        $sql = " INSERT INTO rapores (idComment , idReader) VALUES (:idComment , :idReader)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idComment' , $idComment);
        $stmt->bindParam(':idReader' , $idReader);
        return $stmt->execute();
    }
}