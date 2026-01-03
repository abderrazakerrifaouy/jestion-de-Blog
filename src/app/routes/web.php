<?php
function web($router){
    $router->get('/', 'VisiteurController@home', 'visiteur');
}