<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getThemes()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM themes ORDER BY name ASC"
    );

    $statement->execute();

    $themes = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $themes;
}

function getTheme($themeIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM themes WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $themeIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $theme = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $theme;
}

function getGamesByTheme($themeIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_themes ON games.id = games_themes.id_game
        INNER JOIN themes ON games_themes.id_theme = themes.id
        WHERE themes.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $themeIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesTheme = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesTheme;
}

function countGamesByTheme($themeIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(games.id) FROM games
        INNER JOIN games_themes ON games.id = games_themes.id_game
        INNER JOIN themes ON games_themes.id_theme = themes.id
        WHERE themes.id_public = :id_public"
    );

    $statement->bindParam(':id_public', $themeIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function countTheme($themeIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM themes WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $themeIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}