<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countGame($gameIdPublic)) {
    $game = getGame($gameIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/games/read.php');
} else {
    header('Location: /administration/jeux');
    exit();
}