<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/developers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countDeveloper($developerIdPublic)) {
    $developer = getDeveloper($developerIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/developers/read.php');
} else {
    header('Location: /administration/developpeurs');
    exit();
}