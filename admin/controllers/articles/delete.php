<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countArticle($articleIdPublic)) {
    $article = getArticle($articleIdPublic);

    if (isset($_POST['deleteArticleSubmit'])) {

        if (deleteArticle($article['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/articles/".$article['illustration']);
            $articleDeleted = true;
            header('Location: /administration/articles');
            exit();
        } else {
            $message = "Inconnue";
            $articleDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/articles/delete.php');
} else {
    header('Location: /administration/articles');
    exit();
}