<?php
namespace App\Repository;
use App\Core\Database;
use PDO;

class LikeRepository{
    private $pdo ;
    private static $LikeRepository ;
    private function __construct(){
        $this->pdo = Database::getInstance();
    }
    public static function getRepository(){
        if (self::$LikeRepository === null) {
            self::$LikeRepository = new self();
        }
        return self::$LikeRepository ;
    }

    public function getAllLike($idArticle)
    {
        $sql = "select * from article_likes where idArticle = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $idArticle);
        $stmt->execute();
        $Likes = $stmt->fetchAll();
        return $Likes;
    }
    public function getTotaleLikesByidAuthor($idAuthor)
    {
        $sql = "SELECT al.*
                FROM article_likes al
                JOIN articles a ON al.idArticle = a.id
                WHERE a.idAuthor = :idAuthor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idAuthor', $idAuthor);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result ;
    }

    public function getLiksByCommentId($idComment)
    {
        $sql = "SELECT * FROM comment_likes WHERE idComment = :idComment";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idComment', $idComment);
        $stmt->execute();
        $likes = $stmt->fetchAll();
        return $likes;
    }
    public function addLikeToArticle($idArticle, $idReader)
    {
        $sql = "INSERT INTO article_likes (idArticle, idReader) VALUES (:idArticle, :idReader)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->bindParam(':idReader', $idReader);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function removeLikeFromArticle($idArticle, $idReader)
    {
        $sql = "DELETE FROM article_likes WHERE idArticle = :idArticle AND idReader = :idReader";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->bindParam(':idReader', $idReader);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function addLikeToComment($idComment, $idReader)
    {
        $sql = "INSERT INTO comment_likes (idComment, idReader) VALUES (:idComment, :idReader)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idComment', $idComment);
        $stmt->bindParam(':idReader', $idReader);
        $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
    }
    public function removeLikeFromComment($idComment, $idReader)
    {
        $sql = "DELETE FROM comment_likes WHERE idComment = :idComment AND idReader = :idReader";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idComment', $idComment);
        $stmt->bindParam(':idReader', $idReader);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function isCommentLikedByUser($idComment, $idReader)
    {
        $sql = "SELECT * FROM comment_likes WHERE idComment = :idComment AND idReader = :idReader";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idComment', $idComment);
        $stmt->bindParam(':idReader', $idReader);
        $stmt->execute();
        $like = $stmt->fetch();
        
        if ($like) {
            return true;
        } else {
            return false;
        }
    }
    public function isArticleLikedByUser($idArticle, $idReader)
    {
        $sql = "SELECT * FROM article_likes WHERE idArticle = :idArticle AND idReader = :idReader";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->bindParam(':idReader', $idReader);
        $stmt->execute();
        $like = $stmt->fetch();
        if ($like) {
            return true;
        } else {
            return false;
        }
    }

}