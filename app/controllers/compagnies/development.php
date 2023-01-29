<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countGamesByDeveloper($companyIdPublic) != 0) {
    $company = getCompany($companyIdPublic);

    $gamesDeveloper = getGamesByDeveloper($companyIdPublic);

    $numberGamesByDeveloper = countGamesByDeveloper($companyIdPublic);
    $numberGamesByPublisher = countGamesByPublisher($companyIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/compagnies/development.php');
} else {
    header('Location: /entreprises/' . $companyIdPublic);
    exit();
}