<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getConsoles()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM consoles ORDER BY id ASC"
    );

    $statement->execute();

    $consoles = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $consoles;
}

function getConsole($consoleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM consoles WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $consoleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $console = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $console;
}

function getGamesByConsole($consoleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_consoles ON games.id = games_consoles.id_game
        INNER JOIN consoles ON games_consoles.id_console = consoles.id
        WHERE consoles.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $consoleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesConsole = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesConsole;
}

function countGamesByConsole($consoleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(games.id) FROM games
        INNER JOIN games_consoles ON games.id = games_consoles.id_game
        INNER JOIN consoles ON games_consoles.id_console = consoles.id
        WHERE consoles.id_public = :id_public"
    );

    $statement->bindParam(':id_public', $consoleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function countConsole($consoleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM consoles WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $consoleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function addConsole($consoleIdPublic, $name, $color, $illustration, $description, $releaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO consoles (id_public, name, color, illustration, description, release_date) VALUES (:id_public, :name, :color, :illustration, :description, :release_date)"
    );

    $statement->bindParam(':id_public', $consoleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':color', $color, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $illustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':release_date', $releaseDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateConsole($consoleId, $name, $color, $illustration, $description, $releaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE consoles SET name = :name, color = :color, illustration = :illustration, description = :description, release_date = :release_date WHERE id = :id"
    );

    $statement->bindParam(':id', $consoleId, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':color', $color, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $illustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':release_date', $releaseDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteConsole($consoleId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM consoles WHERE id = :id"
    );

    $statement->bindParam(':id', $consoleId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}