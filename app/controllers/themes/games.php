<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/themes.php');

if (countGamesByTheme($themeIdPublic) != 0) {
    $theme = getTheme($themeIdPublic);

    $gamesTheme = getGamesByTheme($themeIdPublic);

    $numberGamesByTheme = countGamesByTheme($themeIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/themes/games.php');
} else {
    header('Location: /themes');
    exit();
}