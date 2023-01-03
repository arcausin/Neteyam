<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countGame($gameIdPublic)) {
    $game = getGame($gameIdPublic);

    if (isset($_POST['deleteGameSubmit'])) {

        if (deleteGame($game['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/games/".$game['illustration']);
            $gameDeleted = true;
            header('Location: /administration/jeux');
            exit();
        } else {
            $message = "Inconnue";
            $gameDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/games/delete.php');
} else {
    header('Location: /administration/jeux');
    exit();
}