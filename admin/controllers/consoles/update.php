<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/consoles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countConsole($consoleIdPublic)) {
    $console = getConsole($consoleIdPublic);

    if (isset($_POST['updateConsoleSubmit'])) {
        $consoleName = validationInput($_POST['consoleName']);
        $consoleColor = validationInput($_POST['consoleColor']);
        $consoleDescription = validationInput($_POST['consoleDescription']);
        $consoleReleaseDate = validationInput($_POST['consoleReleaseDate']);

        if (empty($consoleName)) {
            $message = "Veuillez ajouter un nom à la console";
            $consoleUpdated = false;
        } elseif (empty($consoleColor)) {
            $message = "Veuillez ajouter une couleur à la console";
            $consoleUpdated = false;
        } elseif (empty($consoleDescription)) {
            $message = "Veuillez ajouter une description à la console";
            $consoleUpdated = false;
        } elseif (empty($consoleReleaseDate)) {
            $message = "Veuillez ajouter une date de sortie à lq console";
            $consoleUpdated = false;
        } else {
            if ($_FILES['consoleIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['consoleIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['consoleIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $consoleUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/consoles/";
            
                        $extension = checkImageTypeUploadFile($_FILES['consoleIllustration']);
                        $consoleIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['consoleIllustration']['tmp_name'], $folder . $consoleIllustration);
            
                        if (updateConsole($console['id'], $consoleName, $consoleColor, $consoleIllustration, $consoleDescription, $consoleReleaseDate)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/consoles/".$console['illustration']);
                            $consoleUpdated = true;
                            header('Location: /administration/consoles');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $consoleUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['consoleIllustration']);
                    $consoleUpdated = false;
                }
            } else {
                if (updateConsole($console['id'], $consoleName, $consoleColor, $console['illustration'], $consoleDescription, $consoleReleaseDate)) {
                    $consoleUpdated = true;
                    header('Location: /administration/consoles');
                    exit();
                } else {
                    $message = "Inconnue";
                    $consoleUpdated = false;
                }
            }
        }
    }

    $console = getConsole($consoleIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/consoles/update.php');
} else {
    header('Location: /administration/consoles');
    exit();
}