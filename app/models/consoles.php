<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getConsoles()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM consoles ORDER BY release_date DESC"
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