<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getGenres()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM genres ORDER BY name ASC"
    );

    $statement->execute();

    $genres = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $genres;
}

function getGenre($genreIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM genres WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $genreIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $genre = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $genre;
}

function getGamesByGenre($genreIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_genres ON games.id = games_genres.id_game
        INNER JOIN genres ON games_genres.id_genre = genres.id
        WHERE genres.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $genreIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesGenre = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesGenre;
}

function countGamesByGenre($genreIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(games.id) FROM games
        INNER JOIN games_genres ON games.id = games_genres.id_game
        INNER JOIN genres ON games_genres.id_genre = genres.id
        WHERE genres.id_public = :id_public"
    );

    $statement->bindParam(':id_public', $genreIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function countGenre($genreIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM genres WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $genreIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}