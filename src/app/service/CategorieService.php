<?php
namespace App\Service;

use App\Models\Categorie;
use App\Repository\CategorieRepository;

class CategorieService
{
    private static $CategorieService = null;
    private $CategorieRepository;
    private function __construct()
    {
        $this->CategorieRepository = CategorieRepository::getRepository();
    }
    public static function getService()
    {
        if (self::$CategorieService === null) {
            self::$CategorieService = new self();
        }
        return self::$CategorieService;
    }
    public function getMemberCategorie()
    {
        $categorie = $this->CategorieRepository->getAllCategorie();
        return count($categorie);
    }

    public function getAllCategory()
    {
        $categorie = $this->CategorieRepository->getAllCategorie();
        $listCategory = [];
        foreach ($categorie as $c) {
            $a = new Categorie(
                $c['id'] ,
                $c['title']
            );
            $listCategory[] = $a ;
        }
        return $listCategory ;
    } 

    public function createCategorie($title)
    {
        return $this->CategorieRepository->createCategorie($title);
    }
    public function deleteCategorie($id)
    {
        return $this->CategorieRepository->deleteCategorie($id);
    }

}