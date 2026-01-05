<?php


class Article {
    private int $id;
    private int $idAuthor;  
    private string $content;
    public function __construct(
        int $id,
        int $idAuthor,
        string $content
    ) {
        $this->id = $id;
        $this->idAuthor = $idAuthor;
        $this->content = $content;
    }
}