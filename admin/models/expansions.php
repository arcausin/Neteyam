<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getExpansions()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM expansions ORDER BY title ASC"
    );

    $statement->execute();

    $expansions = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $expansions;
}

function getExpansion($expansionIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM expansions WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $expansionIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $expansion = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $expansion;
}

function countExpansion($expansionIdPublic, $expansionId = 0)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id) FROM expansions WHERE id_public = :id_public AND id != :id"
    );

    $statement->bindParam(':id_public', $expansionIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':id', $expansionId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function addExpansion($expansionIdPublic, $expansionTitle, $expansionIllustration, $expansionDescription, $expansionReleaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO expansions (id_public, title, illustration, description, release_date) VALUES (:id_public, :title, :illustration, :description, :release_date)"
    );

    $statement->bindParam(':id_public', $expansionIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':title', $expansionTitle, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $expansionIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $expansionDescription, PDO::PARAM_STR);
    $statement->bindParam(':release_date', $expansionReleaseDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateExpansion($expansionId, $expansionIdPublic, $expansionTitle, $expansionIllustration, $expansionDescription, $expansionReleaseDate)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE expansions SET title = :title, id_public = :id_public, illustration = :illustration, description = :description, release_date = :release_date WHERE id = :id"
    );

    $statement->bindParam(':id', $expansionId, PDO::PARAM_INT);
    $statement->bindParam(':title', $expansionTitle, PDO::PARAM_STR);
    $statement->bindParam(':id_public', $expansionIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':illustration', $expansionIllustration, PDO::PARAM_STR);
    $statement->bindParam(':description', $expansionDescription, PDO::PARAM_STR);
    $statement->bindParam(':release_date', $expansionReleaseDate, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteExpansion($expansionId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM expansions WHERE id = :id"
    );

    $statement->bindParam(':id', $expansionId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}