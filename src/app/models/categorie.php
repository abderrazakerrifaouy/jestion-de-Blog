<?php
namespace App\Models;

class Categorie{
    private  $id;
    private  $title;
    public function __construct($id, $title){
        $this->id = $id;
        $this->title = $title;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    
}