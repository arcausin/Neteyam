<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countArticle($articleIdPublic)) {
    $article = getArticle($articleIdPublic);
    $games = getGamesByArticle($articleIdPublic);
    $author = getAuthorByArticle($articleIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/articles/read.php');
} else {
    header('Location: /administration/articles');
    exit();
}