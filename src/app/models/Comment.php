<?php

namespace App\Models;

class Comment
{
    private $id;
    private $idReader;
    private $idArticle;
    private  $content;
    private $likses = 0;
    private $nameReader;
    private $nLikes ;
    private $isLikedByCurrentUser ;

    public function __construct(
        $id,
        $idReader,
        $idArticle,
        $content , 
        $nameReader
    ) {
        $this->id = $id;
        $this->idReader = $idReader;
        $this->idArticle = $idArticle;
        $this->content = $content;
        $this->nameReader = $nameReader;        
        $this->nLikes = 0;
        $this->isLikedByCurrentUser = false;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getLikses()
    {
        return $this->likses;
    }
    public function setLikses($likses)
    {
        $this->likses = $likses;
    }
    public function idReader()
    {
        return $this->idReader;
    }
    public function idArticle()
    {
        return $this->idArticle;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getNameReader()
    {
        return $this->nameReader;
    }
    public function getNLikes()
    {
        return $this->nLikes;
    }
    public function setNLikes($nLikes)
    {
        $this->nLikes = $nLikes;
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
