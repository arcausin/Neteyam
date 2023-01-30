<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/consoles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countConsole($consoleIdPublic) != 0) {
    $console = getConsole($consoleIdPublic);

    $numberGamesByConsole = countGamesByConsole($consoleIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/consoles/read.php');
} else {
    header('Location: /consoles');
    exit();
}