<?php

namespace App\Repository;

use App\Core\Database;

class CategorieRepository
{
    private static $categorieRepository = null;
    private $pdo;
    private function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public static function getRepository()
    {
        if (self::$categorieRepository == null) {
            self::$categorieRepository = new self();
        }
        return self::$categorieRepository;
    }
    public function getAllCategorie()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }
    public function createCategorie($title)
    {
        $sql = "INSERT INTO categories (title) VALUES (:title)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        return $stmt->execute();
    }
    function deleteCategorie($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getCategorieByuArticleId($articleId)
    {
        $sql = "SELECT c.* FROM categories c
                JOIN category_article ac ON c.id = ac.idCategory
                WHERE ac.idArticle = :articleId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }

    public function create_article_category($articleId, $categoryIds)
    {
        $sql = "INSERT INTO category_article (idArticle, idCategory) VALUES (:articleId, :categoryId)";
        foreach ($categoryIds as $categoryId) {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':articleId', $articleId);
            $stmt->bindParam(':categoryId', $categoryId);
            $stmt->execute();
        }
    }
}