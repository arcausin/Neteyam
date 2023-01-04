<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/publishers.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countPublisher($publisherIdPublic)) {
    $publisher = getPublisher($publisherIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/publishers/read.php');
} else {
    header('Location: /administration/editeurs');
    exit();
}