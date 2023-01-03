<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countArticle($articleIdPublic)) {
    $article = getArticle($articleIdPublic);
    $categoryArticle = getCategoryByArticle($articleIdPublic);
    $author = getAuthorByArticle($articleIdPublic);
    $games = getGamesByArticle($articleIdPublic);

    $lastArticles = getLastArticles($articleIdPublic, 4);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/articles/read.php');
} else {
    header('Location: /');
    exit();
}