<?php

namespace App\Models;

class Article
{
    private $id;
    private $idAuthor;
    private $nameAuthor;
    private $title;
    private  $content;
    private $categories;
    private $likes ;
    private $comments ;
    private $isLikedByCurrentUser = false;
    public function __construct(
        $id,
        $idAuthor,
        $nameAuthor,
        $title,
        $content,
        $likes = 10
    ) {
        $this->id = $id;
        $this->idAuthor = $idAuthor;
        $this->nameAuthor = $nameAuthor;
        $this->title = $title;
        $this->content = $content;
        $this->categories = [];
        $this->likes = $likes;
        $this->comments = [];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }
    public function getNameAuthor()
    {
        return $this->nameAuthor;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getCategories()
    {
        return $this->categories;
    }
    public function addCategory($category)
    {
        $this->categories[] = $category;
    }
    public function getLikes()
    {
        return $this->likes;
    }
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }
    public function getComments()
    {
        return $this->comments;
    }
    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }
    public function isLikedByCurrentUser()
    {
        return $this->isLikedByCurrentUser;
    }
    public function setIsLikedByCurrentUser($isLiked)
    {
        $this->isLikedByCurrentUser = $isLiked;
    }
}
