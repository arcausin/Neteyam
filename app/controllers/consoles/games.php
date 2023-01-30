<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/consoles.php');

if (countGamesByConsole($consoleIdPublic) != 0) {
    $console = getConsole($consoleIdPublic);

    $gamesConsole = getGamesByConsole($consoleIdPublic);

    $numberGamesByConsole = countGamesByConsole($consoleIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/consoles/games.php');
} else {
    header('Location: /consoles/' . $consoleIdPublic);
    exit();
}