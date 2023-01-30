<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/consoles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countConsole($consoleIdPublic)) {
    $console = getConsole($consoleIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/consoles/read.php');
} else {
    header('Location: /administration/consoles');
    exit();
}