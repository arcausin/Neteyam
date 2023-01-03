<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/developers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createDeveloperSubmit'])) {
    $developerTitle = validationInput($_POST['developerTitle']);
    $developerDescription = validationInput($_POST['developerDescription']);
    $developerCreationDate = validationInput($_POST['developerCreationDate']);

    if (empty($developerTitle)) {
        $message = "Veuillez ajouter un titre au développeur";
        $developerCreated = false;
    } elseif (empty($developerDescription)) {
        $message = "Veuillez ajouter une description au développeur";
        $developerCreated = false;
    } elseif (empty($developerCreationDate)) {
        $message = "Veuillez ajouter une date de création au développeur";
        $developerCreated = false;
    } elseif (empty($_FILES['developerIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration au développeur";
        $developerCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['developerIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['developerIllustration'])) {
                $message = "extension de fichier non autorisé";
                $developerCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/developers/";

                $extension = checkImageTypeUploadFile($_FILES['developerIllustration']);
                $developerIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['developerIllustration']['tmp_name'], $folder . $developerIllustration);

                $developerIdPublic = makeIdPublic();

                if (addDeveloper($developerIdPublic, $developerTitle, $developerIllustration, $developerDescription, $developerCreationDate)) {
                    $developerCreated = true;
                    header('Location: /administration/developpeurs');
                    exit();
                } else {
                    $message = "Inconnue";
                    $developerCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['developerIllustration']);
            $developerCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/developers/create.php');