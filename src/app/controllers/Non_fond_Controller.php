<?php
namespace App\Controllers;
use App\Core\Helper;

class Non_fond_Controller {
    public function notFound() {
        http_response_code(404);
        Helper::view('errors/errore');
    }
}