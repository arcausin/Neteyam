<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/consoles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createConsoleSubmit'])) {
    $consoleName = validationInput($_POST['consoleName']);
    $consoleColor = validationInput($_POST['consoleColor']);
    $consoleDescription = validationInput($_POST['consoleDescription']);
    $consoleReleaseDate = validationInput($_POST['consoleReleaseDate']);

    if (empty($consoleName)) {
        $message = "Veuillez ajouter un nom à la console";
        $consoleCreated = false;
    } elseif (empty($consoleColor)) {
        $message = "Veuillez ajouter une couleur à la console";
        $consoleCreated = false;
    } elseif (empty($consoleDescription)) {
        $message = "Veuillez ajouter une description à la console";
        $consoleCreated = false;
    } elseif (empty($consoleReleaseDate)) {
        $message = "Veuillez ajouter une date de sortie à la console";
        $consoleCreated = false;
    } elseif (empty($_FILES['consoleIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration à la console";
        $consoleCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['consoleIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['consoleIllustration'])) {
                $message = "extension de fichier non autorisé";
                $consoleCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/consoles/";

                $extension = checkImageTypeUploadFile($_FILES['consoleIllustration']);
                $consoleIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['consoleIllustration']['tmp_name'], $folder . $consoleIllustration);

                $consoleIdPublic = makeIdPublic();

                if (addConsole($consoleIdPublic, $consoleName, $consoleColor, $consoleIllustration, $consoleDescription, $consoleReleaseDate)) {
                    $consoleCreated = true;
                    header('Location: /administration/consoles');
                    exit();
                } else {
                    $message = "Inconnue";
                    $consoleCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['consoleIllustration']);
            $consoleCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/consoles/create.php');