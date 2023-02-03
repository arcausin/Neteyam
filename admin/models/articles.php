<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getArticles()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles ORDER BY creation_date DESC"
    );

    $statement->execute();

    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $articles;
}

function getNews()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 1 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $news = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $news;
}

function getReviews()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 2 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $reviews = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $reviews;
}

function getGuides()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 3 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $guides = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $guides;
}

function getFeatures()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_category = 4 ORDER BY creation_date DESC"
    );

    $statement->execute();

    $features = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $features;
}

function getArticle($articleIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM articles WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $article = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $article;
}

function getCategories()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM categories ORDER BY id ASC"
    );

    $statement->execute();

    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $categories;
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

function getCategoryById($categoryId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM categories WHERE id = :id"
    );

    $statement->bindParam(':id', $categoryId, PDO::PARAM_INT);

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

function getAuthors()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM users ORDER BY pseudonym ASC"
    );

    $statement->execute();

    $authors = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $authors;
}

function countArticle($articleIdPublic, $articleId = 0)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id) FROM articles WHERE id_public = :id_public AND id != :id"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':id', $articleId, PDO::PARAM_INT);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function addArticle($articleIdPublic, $authorId, $categoryId, $articleTitle, $articleIllustration, $articleSubtitle, $articleContents)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO articles (id_public, id_author, id_category, title, illustration, subtitle, contents, validate, visible, creation_date) VALUES (:id_public, :id_author, :id_category, :title, :illustration, :subtitle, :contents, 0, 0, NOW())"
    );

    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':id_author', $authorId, PDO::PARAM_INT);
    $statement->bindParam(':id_category', $categoryId, PDO::PARAM_INT);
    $statement->bindParam(':title', $articleTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $articleIllustration, PDO::PARAM_STR);
    $statement->bindParam(':subtitle', $articleSubtitle, PDO::PARAM_STR);
    $statement->bindParam(':contents', $articleContents, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateArticle($articleId, $articleIdPublic, $authorId, $categoryId, $articleTitle, $articleIllustration, $articleSubtitle, $articleContents, $articleValidate, $articleVisible)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE articles SET id_author = :id_author, id_category = :id_category, title = :title, id_public = :id_public, illustration = :illustration, subtitle = :subtitle, contents = :contents, validate = :validate, visible = :visible, update_date = NOW() WHERE id = :id"
    );

    $statement->bindParam(':id', $articleId, PDO::PARAM_INT);
    $statement->bindParam(':id_author', $authorId, PDO::PARAM_INT);
    $statement->bindParam(':id_category', $categoryId, PDO::PARAM_INT);
    $statement->bindParam(':title', $articleTitle, PDO::PARAM_STR);
    $statement->bindParam(':id_public', $articleIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $articleIllustration, PDO::PARAM_STR);
    $statement->bindParam(':subtitle', $articleSubtitle, PDO::PARAM_STR);
    $statement->bindParam(':contents', $articleContents, PDO::PARAM_STR);
    $statement->bindParam(':validate', $articleValidate, PDO::PARAM_INT);
    $statement->bindParam(':visible', $articleVisible, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteArticle($articleId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM articles WHERE id = :id"
    );

    $statement->bindParam(':id', $articleId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}