<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function getUsers()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM users ORDER BY pseudonym ASC"
    );

    $statement->execute();

    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    $database = null;

    return $users;
}

function getUser($userIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM users WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $userIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $user;
}

function countUser($userIdPublic)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(id_public) FROM users WHERE id_public = :id_public"
    );

    $statement->bindParam(':id_public', $userIdPublic, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}