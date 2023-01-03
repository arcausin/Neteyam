<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getPublishers()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM publishers ORDER BY title ASC"
    );

    $statement->execute();

    $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $publishers;
}

function getPublisher($publisherIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM publishers WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $publisherIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $publisher = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $publisher;
}

function getGamesByPublisher($publisherIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT games.* FROM games
        INNER JOIN games_publishers ON games.id = games_publishers.id_game
        INNER JOIN publishers ON games_publishers.id_publisher = publishers.id
        WHERE publishers.id_public = :id_public ORDER BY games.release_date DESC"
    );

    $statement->bindParam(':id_public', $publisherIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    $gamesPublisher = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $gamesPublisher;
}

function countPublisher($publisherIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM publishers WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $publisherIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $count = $statement->fetchColumn();

    $database = null;

    return $count;
}

function addPublisher($publisherIdPublic, $publisherTitle, $publisherIllustration, $publisherDescription, $publisherCreationDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO publishers (id_public, title, illustration, description, creation_date) VALUES (:id_public, :title, :illustration, :description, :creation_date)"
    );

    $statement->bindParam(':id_public', $publisherIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':title', $publisherTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $publisherIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $publisherDescription, PDO::PARAM_STR);
    $statement->bindParam(':creation_date', $publisherCreationDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updatePublisher($publisherId, $publisherTitle, $publisherIllustration, $publisherDescription, $publisherCreationDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE publishers SET title = :title, illustration = :illustration, description = :description, creation_date = :creation_date WHERE id = :id"
    );

    $statement->bindParam(':id', $publisherId, PDO::PARAM_INT);
    $statement->bindParam(':title', $publisherTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $publisherIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $publisherDescription, PDO::PARAM_STR);
    $statement->bindParam(':creation_date', $publisherCreationDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deletePublisher($publisherId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM publishers WHERE id = :id"
    );

    $statement->bindParam(':id', $publisherId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}