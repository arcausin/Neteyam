<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getCompagnies()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM Compagnies ORDER BY title ASC"
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
        "SELECT * FROM Compagnies WHERE id_public = :id_public"
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
        INNER JOIN games_Developers ON games.id = games_Developers.id_game
        INNER JOIN Compagnies ON games_Developers.id_company = Compagnies.id
        WHERE Compagnies.id_public = :id_public ORDER BY games.release_date DESC"
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
        INNER JOIN games_Publishers ON games.id = games_Publishers.id_game
        INNER JOIN Compagnies ON games_Publishers.id_company = Compagnies.id
        WHERE Compagnies.id_public = :id_public ORDER BY games.release_date DESC"
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
        "SELECT COUNT(id_public) FROM Compagnies WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $companyIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function addCompany($companyIdPublic, $companyTitle, $companyIllustration, $companyDescription, $companyCreationDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO Compagnies (id_public, title, illustration, description, creation_date) VALUES (:id_public, :title, :illustration, :description, :creation_date)"
    );

    $statement->bindParam(':id_public', $companyIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':title', $companyTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $companyIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $companyDescription, PDO::PARAM_STR);
    $statement->bindParam(':creation_date', $companyCreationDate, PDO::PARAM_STR);

    $statement->execute();
    
    $database = null;

    return $statement->rowCount();
}

function updateCompany($companyId, $companyTitle, $companyIllustration, $companyDescription, $companyCreationDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE Compagnies SET title = :title, illustration = :illustration, description = :description, creation_date = :creation_date WHERE id = :id"
    );

    $statement->bindParam(':id', $companyId, PDO::PARAM_STR);
    $statement->bindParam(':title', $companyTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $companyIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $companyDescription, PDO::PARAM_STR);
    $statement->bindParam(':creation_date', $companyCreationDate, PDO::PARAM_STR);

    $statement->execute();
    
    $database = null;

    return $statement->rowCount();
}

function deleteCompany($companyId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM Compagnies WHERE id = :id"
    );

    $statement->bindParam(':id', $companyId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}