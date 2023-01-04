<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/developers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countDeveloper($developerIdPublic)) {
    $developer = getDeveloper($developerIdPublic);

    if (isset($_POST['deleteDeveloperSubmit'])) {

        if (deleteDeveloper($developer['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/developers/".$developer['illustration']);
            $developerDeleted = true;
            header('Location: /administration/developpeurs');
            exit();
        } else {
            $message = "Inconnue";
            $developerDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/developers/delete.php');
} else {
    header('Location: /administration/developpeurs');
    exit();
}