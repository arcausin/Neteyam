<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getCompagnies()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM compagnies ORDER BY title ASC"
    );

    $statement->execute();

    $compagnies = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $compagnies;
}

function getCompany($companyIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM compagnies WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $companyIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $company = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $company;
}

function getGamesByDeveloper($companyIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_developers ON games.id = games_developers.id_game
        INNER JOIN compagnies ON games_developers.id_company = compagnies.id
        WHERE compagnies.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $companyIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesDeveloper = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesDeveloper;
}

function getGamesByPublisher($companyIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_publishers ON games.id = games_publishers.id_game
        INNER JOIN compagnies ON games_publishers.id_company = compagnies.id
        WHERE compagnies.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $companyIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesPublisher = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesPublisher;
}

function countCompany($companyIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM compagnies WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $companyIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}