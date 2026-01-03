<?php
session_start();
    require_once __DIR__ . '/../bootstrap/autoload.php';
    require_once __DIR__ . '/../app/routes/web.php';
    use App\Core\Router;

try {
    $router = new Router();

    web($router);

    $router->generePath();
} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}
