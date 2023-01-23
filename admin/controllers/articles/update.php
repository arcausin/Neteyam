<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countArticle($articleIdPublic)) {
    $article = getArticle($articleIdPublic);

    $categoryArticle = getCategoryByArticle($articleIdPublic);
    $categories = getCategories();

    $authorArticle = getAuthorByArticle($articleIdPublic);
    $authors = getAuthors();

    if (isset($_POST['updateArticleSubmit'])) {
        $articleTitle = validationInput($_POST['articleTitle']);
        $articleSubtitle = validationContentsArticle($_POST['articleSubtitle']);
        $articleContents = validationContentsArticle($_POST['articleContents']);
        $articleCategory = validationInput($_POST['articleCategory']);
        $articleAuthor = validationInput($_POST['articleAuthor']);
        
        if ($_POST['articleValidate'] == 'on') {
            $articleValidate = 1;
        } else {
            $articleValidate = 0;
        }

        if ($_POST['articleVisible'] == 'on') {
            $articleVisible = 1;
        } else {
            $articleVisible = 0;
        }

        if (empty($articleTitle)) {
            $message = "Veuillez ajouter un titre à l'article";
            $articleUpdated = false;
        } elseif (empty($articleSubtitle)) {
            $message = "Veuillez ajouter un sous-titre à l'article";
            $articleUpdated = false;
        } elseif (empty($articleContents)) {
            $message = "Veuillez ajouter un contenu à l'article";
            $articleUpdated = false;
        } elseif (empty($articleCategory)) {
            $message = "Veuillez ajouter une catégorie à l'article";
            $articleUpdated = false;
        } elseif (empty($articleAuthor)) {
            $message = "Veuillez ajouter un auteur à l'article";
            $articleUpdated = false;
        } else {
            if ($_FILES['articleIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['articleIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['articleIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $articleUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/articles/";
            
                        $extension = checkImageTypeUploadFile($_FILES['articleIllustration']);
                        $articleIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['articleIllustration']['tmp_name'], $folder . $articleIllustration);
            
                        if (updateArticle($article['id'], $articleAuthor, $articleCategory, $articleTitle, $articleIllustration, $articleSubtitle, $articleContents, $articleValidate, $articleVisible)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/articles/".$article['illustration']);
                            $articleUpdated = true;
                            header('Location: /administration/articles');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $articleUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['articleIllustration']);
                    $articleUpdated = false;
                }
            } else {
                if (updateArticle($article['id'], $articleAuthor, $articleCategory, $articleTitle, $article['illustration'], $articleSubtitle, $articleContents, $articleValidate, $articleVisible)) {
                    $articleUpdated = true;
                    header('Location: /administration/articles');
                    exit();
                } else {
                    $message = "Inconnue";
                    $articleUpdated = false;
                }
            }
        }
    }

    $article = getArticle($articleIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/articles/update.php');
} else {
    header('Location: /administration/articles');
    exit();
}