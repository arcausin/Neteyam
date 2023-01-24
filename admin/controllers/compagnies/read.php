<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countCompany($companyIdPublic)) {
    $company = getCompany($companyIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/compagnies/read.php');
} else {
    header('Location: /administration/entreprises');
    exit();
}