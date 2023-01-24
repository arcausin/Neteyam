<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countCompany($companyIdPublic)) {
    $company = getCompany($companyIdPublic);

    if (isset($_POST['deleteCompanySubmit'])) {

        if (deleteCompany($company['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/compagnies/".$company['illustration']);
            $companyDeleted = true;
            header('Location: /administration/entreprises');
            exit();
        } else {
            $message = "Inconnue";
            $companyDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/compagnies/delete.php');
} else {
    header('Location: /administration/entreprises');
    exit();
}