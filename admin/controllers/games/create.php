<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createGameSubmit'])) {
    $gameTitle = validationInput($_POST['gameTitle']);
    $gameDescription = validationInput($_POST['gameDescription']);
    $gameReleaseDate = validationInput($_POST['gameReleaseDate']);

    if (empty($gameTitle)) {
        $message = "Veuillez ajouter un titre au jeu";
        $gameCreated = false;
    } elseif (empty($gameDescription)) {
        $message = "Veuillez ajouter une description au jeu";
        $gameCreated = false;
    } elseif (empty($gameReleaseDate)) {
        $message = "Veuillez ajouter une date de sortie au jeu";
        $gameCreated = false;
    } elseif (empty($_FILES['gameIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration au jeu";
        $gameCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['gameIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['gameIllustration'])) {
                $message = "extension de fichier non autorisé";
                $gameCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/games/";

                $extension = checkImageTypeUploadFile($_FILES['gameIllustration']);
                $gameIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['gameIllustration']['tmp_name'], $folder . $gameIllustration);

                $gameIdPublic = makeIdPublic();

                if (addGame($gameIdPublic, $gameTitle, $gameIllustration, $gameDescription, $gameReleaseDate)) {
                    $gameCreated = true;
                    header('Location: /administration/jeux');
                    exit();
                } else {
                    $message = "Inconnue";
                    $gameCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['gameIllustration']);
            $gameCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/games/create.php');