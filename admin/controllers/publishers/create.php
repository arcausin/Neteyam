<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/publishers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createPublisherSubmit'])) {
    $publisherTitle = validationInput($_POST['publisherTitle']);
    $publisherDescription = validationInput($_POST['publisherDescription']);
    $publisherCreationDate = validationInput($_POST['publisherCreationDate']);

    if (empty($publisherTitle)) {
        $message = "Veuillez ajouter un titre à l'éditeur";
        $publisherCreated = false;
    } elseif (empty($publisherDescription)) {
        $message = "Veuillez ajouter une description à l'éditeur";
        $publisherCreated = false;
    } elseif (empty($publisherCreationDate)) {
        $message = "Veuillez ajouter une date de création à l'éditeur";
        $publisherCreated = false;
    } elseif (empty($_FILES['publisherIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration à l'éditeur";
        $publisherCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['publisherIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['publisherIllustration'])) {
                $message = "extension de fichier non autorisé";
                $publisherCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/publishers/";

                $extension = checkImageTypeUploadFile($_FILES['publisherIllustration']);
                $publisherIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['publisherIllustration']['tmp_name'], $folder . $publisherIllustration);

                $publisherIdPublic = makeIdPublic();

                if (addPublisher($publisherIdPublic, $publisherTitle, $publisherIllustration, $publisherDescription, $publisherCreationDate)) {
                    $publisherCreated = true;
                    header('Location: /administration/editeurs');
                    exit();
                } else {
                    $message = "Inconnue";
                    $publisherCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['publisherIllustration']);
            $publisherCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/publishers/create.php');