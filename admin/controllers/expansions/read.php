<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/expansions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countExpansion($expansionIdPublic)) {
    $expansion = getExpansion($expansionIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/expansions/read.php');
} else {
    header('Location: /administration/extensions');
    exit();
}