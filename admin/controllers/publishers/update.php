<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/publishers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countPublisher($publisherIdPublic)) {
    $publisher = getPublisher($publisherIdPublic);

    if (isset($_POST['updatePublisherSubmit'])) {
        $publisherTitle = validationInput($_POST['publisherTitle']);
        $publisherDescription = validationInput($_POST['publisherDescription']);
        $publisherCreationDate = validationInput($_POST['publisherCreationDate']);

        if (empty($publisherTitle)) {
            $message = "Veuillez ajouter un titre à l'éditeur";
            $publisherUpdated = false;
        } elseif (empty($publisherDescription)) {
            $message = "Veuillez ajouter une description à l'éditeur";
            $publisherUpdated = false;
        } elseif (empty($publisherCreationDate)) {
            $message = "Veuillez ajouter une date de création à l'éditeur";
            $publisherUpdated = false;
        } else {
            if ($_FILES['publisherIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['publisherIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['publisherIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $publisherUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/publishers/";
            
                        $extension = checkImageTypeUploadFile($_FILES['publisherIllustration']);
                        $publisherIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['publisherIllustration']['tmp_name'], $folder . $publisherIllustration);
            
                        if (updatePublisher($publisher['id'], $publisherTitle, $publisherIllustration, $publisherDescription, $publisherCreationDate)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/publishers/".$publisher['illustration']);
                            $publisherUpdated = true;
                            header('Location: /administration/editeurs');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $publisherUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['publisherIllustration']);
                    $publisherUpdated = false;
                }
            } else {
                if (updatePublisher($publisher['id'], $publisherTitle, $publisher['illustration'], $publisherDescription, $publisherCreationDate)) {
                    $publisherUpdated = true;
                    header('Location: /administration/editeurs');
                    exit();
                } else {
                    $message = "Inconnue";
                    $publisherUpdated = false;
                }
            }
        }
    }

    $publisher = getPublisher($publisherIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/publishers/update.php');
} else {
    header('Location: /administration/editeurs');
    exit();
}