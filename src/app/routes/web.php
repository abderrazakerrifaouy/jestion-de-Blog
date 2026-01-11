<?php
function web($router)
{
    $router->get('/', 'VisiteurController@home', 'visiteur');
    $router->get('/register', 'VisiteurController@showRegistrationForm', 'visiteur');
    $router->get('/login', 'VisiteurController@showLoginForm', 'visiteur');
    $router->post('/register', 'VisiteurController@register', 'visiteur');
    $router->post('/login', 'VisiteurController@login', 'visiteur');


    $router->get('/', 'AdminController@index', 'admin');
    $router->get('/logout', 'VisiteurController@logout', 'admin');
    $router->get('/categories', 'AdminController@categories', 'admin');
    $router->post('/categorie', 'AdminController@createCategorie', 'admin');
    $router->post('/process_category', 'AdminController@deleteCategorie', 'admin');
    $router->get('/admin_roles', 'AdminController@adminRoles', 'admin');
    $router->post('/process_role_change', 'AdminController@processRoleChange', 'admin');


    $router->get('/', 'AuthorController@index', 'author');
    $router->get('/logout', 'VisiteurController@logout', 'author');
    $router->get('/create-article', 'AuthorController@createArticle', 'author');
    $router->get('/delete-article', 'AuthorController@deleteArticle', 'author');
    $router->get('/afiche-article', 'AuthorController@aficheArticle', 'author');
    $router->post('/create-article', 'AuthorController@storeArticle', 'author');
    $router->get('/articles', 'AuthorController@afficheArticles', 'author');
    $router->get('/lire_article', 'AuthorController@lireArticle', 'author');
    $router->post('/createComent', 'AuthorController@createComent', 'author');
    $router->post('/like_article', 'AuthorController@likeArticle', 'author');
    $router->post('/Dislike_article', 'AuthorController@dislikeArticle', 'author');
    $router->post('/likeComment', 'AuthorController@likeComment', 'author');
    $router->post('/dislikeComment', 'AuthorController@dislikeComment', 'author');
    $router->post('/raporeComment', 'AuthorController@raporeComment', 'author');


    $router->get('/', 'ReaderController@index', 'reader');
    $router->get('/logout', 'VisiteurController@logout', 'reader');
    $router->get('/articles', 'ReaderController@afficheArticles', 'reader');
    $router->get('/lire_article', 'ReaderController@lireArticle', 'reader');
     $router->post('/createComent', 'ReaderController@createComent', 'reader');
    $router->post('/like_article', 'ReaderController@likeArticle', 'reader');
    $router->post('/Dislike_article', 'ReaderController@dislikeArticle', 'reader');
    $router->post('/likeComment', 'ReaderController@likeComment', 'reader');
    $router->post('/dislikeComment', 'ReaderController@dislikeComment', 'reader');
    $router->get('/profile', 'ReaderController@profile', 'reader');
    $router->post('/request_role_change', 'ReaderController@becomeAuthor', 'reader');
    $router->post('/raporeComment', 'ReaderController@raporeComment', 'reader');
    
}
