<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/expansions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createExpansionSubmit'])) {
    $expansionTitle = validationInput($_POST['expansionTitle']);
    $expansionDescription = validationInput($_POST['expansionDescription']);
    $expansionReleaseDate = validationInput($_POST['expansionReleaseDate']);

    if (empty($expansionTitle)) {
        $message = "Veuillez ajouter un titre à l'extension";
        $expansionCreated = false;
    } elseif (empty($expansionDescription)) {
        $message = "Veuillez ajouter une description à l'extension";
        $expansionCreated = false;
    } elseif (empty($expansionReleaseDate)) {
        $message = "Veuillez ajouter une date de sortie à l'extension";
        $expansionCreated = false;
    } elseif (empty($_FILES['expansionIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration à l'extension";
        $expansionCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['expansionIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['expansionIllustration'])) {
                $message = "extension de fichier non autorisé";
                $expansionCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/expansions/";

                $extension = checkImageTypeUploadFile($_FILES['expansionIllustration']);
                $expansionIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['expansionIllustration']['tmp_name'], $folder . $expansionIllustration);

                $expansionIdPublic = makeIdPublic();

                if (addExpansion($expansionIdPublic, $expansionTitle, $expansionIllustration, $expansionDescription, $expansionReleaseDate)) {
                    $expansionCreated = true;
                    header('Location: /administration/extensions');
                    exit();
                } else {
                    $message = "Inconnue";
                    $expansionCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['expansionIllustration']);
            $expansionCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/expansions/create.php');