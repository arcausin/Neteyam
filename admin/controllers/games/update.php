<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countGame($gameIdPublic)) {
    $game = getGame($gameIdPublic);

    $developersGame = getDevelopersByGame($gameIdPublic);
    $publishersGame = getPublishersByGame($gameIdPublic);

    $compagnies = getCompagnies();

    $consoles = getConsoles();
    $genres = getGenres();
    $themes = getThemes();

    if (isset($_POST['updateDevelopersGameSubmit'])) {
        if (!empty($_POST['developerGame'])) {
            $developerGame = $_POST['developerGame'];
            if (addDeveloperGame($game['id'], $developerGame)) {
                $developerGameAdded = true;
            } else {
                $message = "Inconnue";
                $developerGameAdded = false;
            }
        }
        $developersGame = getDevelopersByGame($gameIdPublic);
    }

    if (isset($_POST['updatePublishersGameSubmit'])) {
        if (!empty($_POST['publisherGame'])) {
            $publisherGame = $_POST['publisherGame'];
            if (addPublisherGame($game['id'], $publisherGame)) {
                $publisherGameAdded = true;
            } else {
                $message = "Inconnue";
                $publisherGameAdded = false;
            }
        }
        $publishersGame = getPublishersByGame($gameIdPublic);
    }
    
    if (isset($_POST['updateConsolesGameSubmit'])) {
        if (isset($_POST['consolesGame'])) {
            $consolesGameId = $_POST['consolesGame'];
            foreach ($consolesGameId as $consoleGameId) {
                if (countConsoleGame($game['id'], $consoleGameId)) {
                    $message = "La console est déjà liée au jeu";
                    $consoleGameAdded = false;
                } else {
                    if (addConsoleGame($game['id'], $consoleGameId)) {
                        $consoleGameAdded = true;
                    } else {
                        $message = "Inconnue";
                        $consoleGameAdded = false;
                    }
                }
            }
        }

        if(isset($_POST['unchecked_consoles'])) {
            $uncheckedConsoles = explode(',', implode($_POST['unchecked_consoles']));
            foreach($uncheckedConsoles as $uncheckedConsole) {
                if (!countConsoleGame($game['id'], $uncheckedConsole)) {
                    $message = "La console n'est pas liée au jeu";
                    $consoleGameAdded = false;
                } else {
                    if(deleteConsoleGame($game['id'], $uncheckedConsole)){
                        $consoleGameDeleted = true;
                    }else{
                        $message = "Inconnue";
                        $consoleGameDeleted = false;
                    }
                }
            }
        }
    }

    if (isset($_POST['updateGenresGameSubmit'])) {
        if (isset($_POST['genresGame'])) {
            $genresGameId = $_POST['genresGame'];
            foreach ($genresGameId as $genreGameId) {
                if (countGenreGame($game['id'], $genreGameId)) {
                    $message = "Le genre est déjà liée au jeu";
                    $genreGameAdded = false;
                } else {
                    if (addGenreGame($game['id'], $genreGameId)) {
                        $genreGameAdded = true;
                    } else {
                        $message = "Inconnue";
                        $genreGameAdded = false;
                    }
                }
            }
        }

        if(isset($_POST['unchecked_genres'])) {
            $uncheckedGenres = explode(',', implode($_POST['unchecked_genres']));
            foreach($uncheckedGenres as $uncheckedGenre) {
                if (!countGenreGame($game['id'], $uncheckedGenre)) {
                    $message = "Le genre n'est pas liée au jeu";
                    $genreGameAdded = false;
                } else {
                    if(deleteGenreGame($game['id'], $uncheckedGenre)){
                        $genreGameDeleted = true;
                    }else{
                        $message = "Inconnue";
                        $genreGameDeleted = false;
                    }
                }
            }
        }
    }

    if (isset($_POST['updateThemesGameSubmit'])) {
        if (isset($_POST['themesGame'])) {
            $themesGameId = $_POST['themesGame'];
            foreach ($themesGameId as $themeGameId) {
                if (countThemeGame($game['id'], $themeGameId)) {
                    $message = "Le thème est déjà liée au jeu";
                    $themeGameAdded = false;
                } else {
                    if (addThemeGame($game['id'], $themeGameId)) {
                        $themeGameAdded = true;
                    } else {
                        $message = "Inconnue";
                        $themeGameAdded = false;
                    }
                }
            }
        }

        if(isset($_POST['unchecked_themes'])) {
            $uncheckedThemes = explode(',', implode($_POST['unchecked_themes']));
            foreach($uncheckedThemes as $uncheckedTheme) {
                if (!countThemeGame($game['id'], $uncheckedTheme)) {
                    $message = "Le thème n'est pas liée au jeu";
                    $themeGameAdded = false;
                } else {
                    if(deleteThemeGame($game['id'], $uncheckedTheme)){
                        $themeGameDeleted = true;
                    }else{
                        $message = "Inconnue";
                        $themeGameDeleted = false;
                    }
                }
            }
        }
    }

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