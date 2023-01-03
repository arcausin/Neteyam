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

function getGamesTitles()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT id, id_public, title FROM games ORDER BY title ASC"
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
        "SELECT developers.* FROM developers
        INNER JOIN games_developers ON developers.id = games_developers.id_developer
        INNER JOIN games ON games_developers.id_game = games.id
        WHERE games.id_public = :id_public ORDER BY developers.title ASC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $developersGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $developersGame;
}

function getPublishersByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT publishers.* FROM publishers
        INNER JOIN games_publishers ON publishers.id = games_publishers.id_publisher
        INNER JOIN games ON games_publishers.id_game = games.id
        WHERE games.id_public = :id_public ORDER BY publishers.title ASC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $publishersGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $publishersGame;
}

function getArticlesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $articlesGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $articlesGame;
}

function getNewsByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 1 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $newsGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $newsGame;
}

function getReviewsByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 2 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $reviewsGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $reviewsGame;
}

function getGuidesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 3 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $guidesGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $guidesGame;
}

function getFeaturesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 4 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $featuresGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $featuresGame;
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

function updateGame($gameId, $gameTitle, $gameIllustration, $gameDescription, $gameReleaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE games SET title = :title, illustration = :illustration, description = :description, release_date = :release_date WHERE id = :id"
    );

    $statement->bindParam(':id', $gameId, PDO::PARAM_INT);
    $statement->bindParam(':title', $gameTitle, PDO::PARAM_STR);
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

    $statement->execute([$gameId]);

    $database = null;

    return $statement->rowCount();
}