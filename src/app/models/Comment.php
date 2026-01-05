<?php

namespace App\Models;

class Comment {
    private int $id;
    private int $idReader;  
    private int $idArticle;  
    private string $content;

    public function __construct(
        int $id,
        int $idReader,
        int $idArticle,
        string $content
    ) {
        $this->id = $id;
        $this->idReader = $idReader;
        $this->idArticle = $idArticle;
        $this->content = $content;
    }
}