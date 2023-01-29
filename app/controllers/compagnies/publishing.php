<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countGamesByPublisher($companyIdPublic) != 0) {
    $company = getCompany($companyIdPublic);

    $gamesPublisher = getGamesByPublisher($companyIdPublic);

    $numberGamesByDeveloper = countGamesByDeveloper($companyIdPublic);
    $numberGamesByPublisher = countGamesByPublisher($companyIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/compagnies/publishing.php');
} else {
    header('Location: /entreprises/' . $companyIdPublic);
    exit();
}