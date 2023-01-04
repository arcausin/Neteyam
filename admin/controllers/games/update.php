<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countGame($gameIdPublic)) {
    $game = getGame($gameIdPublic);

    if (isset($_POST['updateGameSubmit'])) {
        $gameTitle = validationInput($_POST['gameTitle']);
        $gameDescription = validationInput($_POST['gameDescription']);
        $gameReleaseDate = validationInput($_POST['gameReleaseDate']);

        if (empty($gameTitle)) {
            $message = "Veuillez ajouter un titre au jeu";
            $gameUpdated = false;
        } elseif (empty($gameDescription)) {
            $message = "Veuillez ajouter une description au jeu";
            $gameUpdated = false;
        } elseif (empty($gameReleaseDate)) {
            $message = "Veuillez ajouter une date de sortie au jeu";
            $gameUpdated = false;
        } else {
            if ($_FILES['gameIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['gameIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['gameIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $gameUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/games/";
            
                        $extension = checkImageTypeUploadFile($_FILES['gameIllustration']);
                        $gameIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['gameIllustration']['tmp_name'], $folder . $gameIllustration);
            
                        if (updateGame($game['id'], $gameTitle, $gameIllustration, $gameDescription, $gameReleaseDate)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/games/".$game['illustration']);
                            $gameUpdated = true;
                            header('Location: /administration/jeux');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $gameUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['gameIllustration']);
                    $gameUpdated = false;
                }
            } else {
                if (updateGame($game['id'], $gameTitle, $game['illustration'], $gameDescription, $gameReleaseDate)) {
                    $gameUpdated = true;
                    header('Location: /administration/jeux');
                    exit();
                } else {
                    $message = "Inconnue";
                    $gameUpdated = false;
                }
            }
        }
    }

    $game = getGame($gameIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/games/update.php');
} else {
    header('Location: /administration/jeux');
    exit();
}