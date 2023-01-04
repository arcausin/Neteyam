<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

$categories = getCategories();

if (isset($_POST['createArticleSubmit'])) {
    $articleTitle = validationInput($_POST['articleTitle']);
    $articleSubtitle = validationContentsArticle($_POST['articleSubtitle']);
    $articleContents = validationContentsArticle($_POST['articleContents']);
    $articleCategory = validationInput($_POST['articleCategory']);
    $articleCategory = getCategoryById($articleCategory);

    if (empty($articleTitle)) {
        $message = "Veuillez ajouter un titre à l'article";
        $articleCreated = false;
    } elseif (empty($articleSubtitle)) {
        $message = "Veuillez ajouter un sous-titre à l'article";
        $articleCreated = false;
    } elseif (empty($articleContents)) {
        $message = "Veuillez ajouter un contenu à l'article";
        $articleCreated = false;
    } elseif (empty($articleCategory)) {
        $message = "Veuillez ajouter une catégorie à l'article";
        $articleCreated = false;
    } elseif (empty($_FILES['articleIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration à l'article";
        $articleCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['articleIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['articleIllustration'])) {
                $message = "extension de fichier non autorisé";
                $articleCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/articles/";

                $extension = checkImageTypeUploadFile($_FILES['articleIllustration']);
                $articleIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['articleIllustration']['tmp_name'], $folder . $articleIllustration);

                $articleIdPublic = makeIdPublic();
                $authorId = $_SESSION['user']['id'];

                if (addArticle($articleIdPublic, $authorId, $articleCategory['id'], $articleTitle, $articleIllustration, $articleSubtitle, $articleContents)) {
                    $articleCreated = true;
                    header('Location: /administration/articles');
                    exit();
                } else {
                    $message = "Inconnue";
                    $articleCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['articleIllustration']);
            $articleCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/articles/create.php');