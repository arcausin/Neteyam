<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/consoles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countConsole($consoleIdPublic)) {
    $console = getConsole($consoleIdPublic);

    if (isset($_POST['deleteConsoleSubmit'])) {

        if (deleteConsole($console['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/consoles/".$console['illustration']);
            $consoleDeleted = true;
            header('Location: /administration/consoles');
            exit();
        } else {
            $message = "Inconnue";
            $consoleDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/consoles/delete.php');
} else {
    header('Location: /administration/consoles');
    exit();
}