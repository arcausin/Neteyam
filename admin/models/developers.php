<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getDevelopers()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM developers ORDER BY title ASC"
    );

    $statement->execute();

    $developers = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $developers;
}

function getDeveloper($developerIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM developers WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $developerIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $developer = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $developer;
}

function getGamesByDeveloper($developerIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_developers ON games.id = games_developers.id_game
        INNER JOIN developers ON games_developers.id_developer = developers.id
        WHERE developers.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $developerIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesDeveloper = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesDeveloper;
}

function countDeveloper($developerIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM developers WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $developerIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function addDeveloper($developerIdPublic, $developerTitle, $developerIllustration, $developerDescription, $developerCreationDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO developers (id_public, title, illustration, description, creation_date) VALUES (:id_public, :title, :illustration, :description, :creation_date)"
    );

    $statement->bindParam(':id_public', $developerIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':title', $developerTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $developerIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $developerDescription, PDO::PARAM_STR);
    $statement->bindParam(':creation_date', $developerCreationDate, PDO::PARAM_STR);

    $statement->execute();
    
    $database = null;

    return $statement->rowCount();
}

function updateDeveloper($developerId, $developerTitle, $developerIllustration, $developerDescription, $developerCreationDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE developers SET title = :title, illustration = :illustration, description = :description, creation_date = :creation_date WHERE id = :id"
    );

    $statement->bindParam(':id', $developerId, PDO::PARAM_STR);
    $statement->bindParam(':title', $developerTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $developerIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $developerDescription, PDO::PARAM_STR);
    $statement->bindParam(':creation_date', $developerCreationDate, PDO::PARAM_STR);

    $statement->execute();
    
    $database = null;

    return $statement->rowCount();
}

function deleteDeveloper($developerId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM developers WHERE id = :id"
    );

    $statement->bindParam(':id', $developerId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}