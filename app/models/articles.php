<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getArticles()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE validate = 1 AND visible = 1 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $articles;
}

function getLastArticles($articleIdPublic, $limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE validate = 1 AND visible = 1 AND id_public != :id_public ORDER BY creation_date DESC LIMIT :limit"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

    $statement->execute();

    $lastArticles = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $lastArticles;
}

function getNews()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 1 AND validate = 1 AND visible = 1 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $news = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $news;
}

function getLastNews($articleIdPublic, $limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 1 AND validate = 1 AND visible = 1 AND id_public != :id_public ORDER BY creation_date DESC LIMIT :limit"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

    $statement->execute();

    $lastNews = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $lastNews;
}

function getReviews()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 2 AND validate = 1 AND visible = 1 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $reviews = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $reviews;
}

function getLastReviews($articleIdPublic, $limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 2 AND validate = 1 AND visible = 1 AND id_public != :id_public ORDER BY creation_date DESC LIMIT :limit"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

    $statement->execute();

    $lastReviews = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $lastReviews;
}

function getGuides()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 3 AND validate = 1 AND visible = 1 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $guides = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $guides;
}

function getLastGuides($articleIdPublic, $limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 3 AND validate = 1 AND visible = 1 AND id_public != :id_public ORDER BY creation_date DESC LIMIT :limit"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

    $statement->execute();

    $lastGuides = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $lastGuides;
}

function getFeatures()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 4 AND validate = 1 AND visible = 1 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $features = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $features;
}

function getLastFeatures($articleIdPublic, $limit)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 4 AND validate = 1 AND visible = 1 AND id_public != :id_public ORDER BY creation_date DESC LIMIT :limit"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);

    $statement->execute();

    $lastFeatures = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $lastFeatures;
}

function getArticle($articleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_public = :id_public AND validate = 1 AND visible = 1"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $article = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $article;
}

function getCategoryByArticle($articleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT categories.* FROM categories
        INNER JOIN articles ON categories.id = articles.id_category
        WHERE articles.id_public = :id_public"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $category = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $category;
}

function getGamesByArticle($articleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN articles_games ON games.id = articles_games.id_game
        INNER JOIN articles ON articles_games.id_article = articles.id
        WHERE articles.id_public = :id_public ORDER BY articles_games.id ASC"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $games = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $games;
}

function getAuthorByArticle($articleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT users.* FROM users
        INNER JOIN articles ON users.id = articles.id_author
        WHERE articles.id_public = :id_public"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $author = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $author;
}

function countArticle($articleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM articles WHERE id_public = :id_public AND validate = 1 AND visible = 1"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}