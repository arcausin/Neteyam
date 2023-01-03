<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/publishers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countPublisher($publisherIdPublic)) {
    $publisher = getPublisher($publisherIdPublic);

    if (isset($_POST['deletePublisherSubmit'])) {

        if (deletePublisher($publisher['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/publishers/".$publisher['illustration']);
            $publisherDeleted = true;
            header('Location: /administration/editeurs');
            exit();
        } else {
            $message = "Inconnue";
            $publisherDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/publishers/delete.php');
} else {
    header('Location: /administration/editeurs');
    exit();
}