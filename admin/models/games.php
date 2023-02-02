<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getGames()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM games ORDER BY title ASC"
    );

    $statement->execute();

    $games = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $games;
}

function getGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM games WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $game = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $game;
}

function getDevelopersByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT compagnies.* FROM compagnies
        INNER JOIN games_developers ON compagnies.id = games_developers.id_company
        INNER JOIN games ON games_developers.id_game = games.id
        WHERE games.id_public = :id_public ORDER BY compagnies.title ASC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $developers = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $developers;
}

function addDeveloperGame($gameId, $developerGameId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO games_developers (id_game, id_company) VALUES (:id_game, :id_company)"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_company', $developerGameId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function getPublishersByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT compagnies.* FROM compagnies
        INNER JOIN games_publishers ON compagnies.id = games_publishers.id_company
        INNER JOIN games ON games_publishers.id_game = games.id
        WHERE games.id_public = :id_public ORDER BY compagnies.title ASC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $publishers;
}

function addPublisherGame($gameId, $publisherGameId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO games_publishers (id_game, id_company) VALUES (:id_game, :id_company)"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_company', $publisherGameId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function countGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM games WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function countSlugGame($gameSlug)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id) FROM games WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $gameSlug, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

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

function countConsoleGame($gameId, $consoleId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id) FROM games_consoles WHERE id_game = :id_game AND id_console = :id_console"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_console', $consoleId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function addConsoleGame($gameId, $consoleId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO games_consoles (id_game, id_console) VALUES (:id_game, :id_console)"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_console', $consoleId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteConsoleGame($gameId, $consoleId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM games_consoles WHERE id_game = :id_game AND id_console = :id_console"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_console', $consoleId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function getGenres()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM genres ORDER BY id ASC"
    );

    $statement->execute();

    $genres = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $genres;
}

function countGenreGame($gameId, $genreId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id) FROM games_genres WHERE id_game = :id_game AND id_genre = :id_genre"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_genre', $genreId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function addGenreGame($gameId, $genreId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO games_genres (id_game, id_genre) VALUES (:id_game, :id_genre)"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_genre', $genreId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteGenreGame($gameId, $genreId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM games_genres WHERE id_game = :id_game AND id_genre = :id_genre"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_genre', $genreId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function getThemes()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM themes ORDER BY id ASC"
    );

    $statement->execute();

    $themes = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $themes;
}

function countThemeGame($gameId, $themeId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id) FROM games_themes WHERE id_game = :id_game AND id_theme = :id_theme"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_theme', $themeId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function addThemeGame($gameId, $themeId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO games_themes (id_game, id_theme) VALUES (:id_game, :id_theme)"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_theme', $themeId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteThemeGame($gameId, $themeId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM games_themes WHERE id_game = :id_game AND id_theme = :id_theme"
    );

    $statement->bindParam(':id_game', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':id_theme', $themeId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function addGame($gameIdPublic, $gameTitle, $gameIllustration, $gameDescription, $gameReleaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO games (id_public, title, illustration, description, release_date) VALUES (:id_public, :title, :illustration, :description, :release_date)"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':title', $gameTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $gameIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $gameDescription, PDO::PARAM_STR);
    $statement->bindParam(':release_date', $gameReleaseDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateGame($gameId, $gameIdPublic, $gameTitle, $gameIllustration, $gameDescription, $gameReleaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE games SET title = :title, id_public = :id_public, illustration = :illustration, description = :description, release_date = :release_date WHERE id = :id"
    );

    $statement->bindParam(':id', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':title', $gameTitle, PDO::PARAM_STR);
    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $gameIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $gameDescription, PDO::PARAM_STR);
    $statement->bindParam(':release_date', $gameReleaseDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteGame($gameId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM games WHERE id = :id"
    );

    $statement->bindParam(':id', $gameId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}