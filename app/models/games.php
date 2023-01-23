<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

// Games

function getGames()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM games ORDER BY release_date DESC, title ASC"
    );

    $statement->execute();

    $games = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $games;
}

function getLastGames($limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM games WHERE release_date < NOW() ORDER BY release_date DESC, title ASC LIMIT :limit"
    );

    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

    $statement->execute();

    $games = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $games;
}

function getNextGames($limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM games WHERE release_date > NOW() ORDER BY release_date ASC, title DESC LIMIT :limit"
    );

    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

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

function getGamesBySearch($search)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM games WHERE LOWER(title) LIKE LOWER(:search) ORDER BY release_date DESC, title ASC"
    );

    $searchResult = validationInput($search);

    $statement->bindValue(':search', '%'.$searchResult.'%', PDO::PARAM_STR);

    $statement->execute();

    $gamesSearch = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $gamesSearch;
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

// News by game

function getNewsByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 1 AND articles.validate = 1 AND articles.visible = 1 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $newsGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $newsGame;
}

function countNewsByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(articles.id) FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 1 AND articles.validate = 1 AND articles.visible = 1"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

// Reviews by game

function getReviewsByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 2 AND articles.validate = 1 AND articles.visible = 1 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $reviewsGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $reviewsGame;
}

function countReviewsByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(articles.id) FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 2 AND articles.validate = 1 AND articles.visible = 1"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

// Guides by game

function getGuidesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 3 AND articles.validate = 1 AND articles.visible = 1 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $guidesGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $guidesGame;
}

function countGuidesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(articles.id) FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 3 AND articles.validate = 1 AND articles.visible = 1"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

// Features by game

function getFeaturesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT articles.* FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 4 AND articles.validate = 1 AND articles.visible = 1 ORDER BY articles.creation_date DESC"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $featuresGame = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $featuresGame;
}

function countFeaturesByGame($gameIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(articles.id) FROM articles
        INNER JOIN articles_games ON articles.id = articles_games.id_article
        INNER JOIN games ON articles_games.id_game = games.id
        WHERE games.id_public = :id_public AND articles.id_category = 4 AND articles.validate = 1 AND articles.visible = 1"
    );

    $statement->bindParam(':id_public', $gameIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}