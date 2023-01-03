<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/developers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countDeveloper($developerIdPublic)) {
    $developer = getDeveloper($developerIdPublic);

    if (isset($_POST['updateDeveloperSubmit'])) {
        $developerTitle = validationInput($_POST['developerTitle']);
        $developerDescription = validationInput($_POST['developerDescription']);
        $developerCreationDate = validationInput($_POST['developerCreationDate']);

        if (empty($developerTitle)) {
            $message = "Veuillez ajouter un titre au développeur";
            $developerUpdated = false;
        } elseif (empty($developerDescription)) {
            $message = "Veuillez ajouter une description au développeur";
            $developerUpdated = false;
        } elseif (empty($developerCreationDate)) {
            $message = "Veuillez ajouter une date de création au développeur";
            $developerUpdated = false;
        } else {
            if ($_FILES['developerIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['developerIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['developerIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $developerUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/developers/";
            
                        $extension = checkImageTypeUploadFile($_FILES['developerIllustration']);
                        $developerIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['developerIllustration']['tmp_name'], $folder . $developerIllustration);
            
                        if (updateDeveloper($developer['id'], $developerTitle, $developerIllustration, $developerDescription, $developerCreationDate)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/developers/".$developer['illustration']);
                            $developerUpdated = true;
                            header('Location: /administration/developpeurs');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $developerUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['developerIllustration']);
                    $developerUpdated = false;
                }
            } else {
                if (updateDeveloper($developer['id'], $developerTitle, $developer['illustration'], $developerDescription, $developerCreationDate)) {
                    $developerUpdated = true;
                    header('Location: /administration/developpeurs');
                    exit();
                } else {
                    $message = "Inconnue";
                    $developerUpdated = false;
                }
            }
        }
    }

    $developer = getDeveloper($developerIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/developers/update.php');
} else {
    header('Location: /administration/developpeurs');
    exit();
}