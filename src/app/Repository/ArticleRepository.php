<?php
namespace App\Repository;
use App\Core\Database;

class ArticleRepository{
    private $pdo;
    private static $articleRepository;
    private function __construct(){
        $this->pdo = Database::getInstance();
    }
    public static function getRepository(){
        if (self::$articleRepository === null) {
            self::$articleRepository = new self();
        }
        return self::$articleRepository ;
    }
    public function getAllArticle(){
        $sql = "SELECT a.* , u.firstName FROM articles a
        Join users u on u.id = a.idAuthor
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $article = $stmt->fetchAll();
        return $article;
    }
    public function getArticleByAuthorId($authorId){
        $sql = "SELECT a.* , u.firstName FROM articles a
        Join users u on u.id = a.idAuthor
        WHERE a.idAuthor = :idAuthor ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idAuthor' , $authorId);
        $stmt->execute();
        $article = $stmt->fetchAll();
        return $article;
    }

    public function createArticle($idAuthor , $content , $tetel){
        $sql = "INSERT INTO articles (idAuthor , content , tetel) VALUES (:idAuthor , :content , :tetel)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idAuthor' , $idAuthor);
        $stmt->bindParam(':content' , $content);
        $stmt->bindParam(':tetel' , $tetel);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }
    public function deleteArticle($articleId){
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id' , $articleId);
        $stmt->execute();
    }
    public function getArticleById($articleId){
        $sql = "SELECT a.* , u.firstName FROM articles a
        Join users u on u.id = a.idAuthor
        WHERE a.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id' , $articleId);
        $stmt->execute();
        return $stmt->fetch();
    }
}