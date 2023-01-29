<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countCompany($companyIdPublic)) {
    $company = getCompany($companyIdPublic);

    $gamesDeveloper = getGamesByDeveloper($companyIdPublic);
    $gamesPublisher = getGamesByPublisher($companyIdPublic);

    $numberGamesByDevelopers = countGamesByDeveloper($companyIdPublic);
    $numberGamesByPublishers = countGamesByPublisher($companyIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/compagnies/read.php');
} else {
    header('Location: /entreprises');
    exit();
}