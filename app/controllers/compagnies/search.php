<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/compagnies.php');

if (!empty($search)) {
    $compagniesSearch = getCompagniesBySearch($search);
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/compagnies/search.php');
} else {
    header('Location: /entreprises');
    exit();
}