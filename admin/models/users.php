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

function getUserByMailAdress($userMailAdress)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM users WHERE mail_adress = :mail_adress"
    );

    $statement->bindParam(':mail_adress', $userMailAdress, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    $database = null;

    return $user;
}

function getUserByResetPasswordToken($userResetPasswordToken)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT * FROM users WHERE reset_password_token = :reset_password_token"
    );

    $statement->bindParam(':reset_password_token', $userResetPasswordToken, PDO::PARAM_STR);

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

function countUserPseudonym($userPseudonym)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(pseudonym) FROM users WHERE pseudonym = :pseudonym"
    );

    $statement->bindParam(':pseudonym', $userPseudonym, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function countUserMailAdress($userMailAdress)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(mail_adress) FROM users WHERE mail_adress = :mail_adress"
    );

    $statement->bindParam(':mail_adress', $userMailAdress, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function countUserResetPasswordToken($userResetPasswordToken)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT COUNT(reset_password_token) FROM users WHERE reset_password_token = :reset_password_token"
    );

    $statement->bindParam(':reset_password_token', $userResetPasswordToken, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->fetchColumn();
}

function addUser($userIdPublic, $userPseudonym, $userMailAdress, $userPassword)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO users (id_public, pseudonym, mail_adress, password, creation_date) VALUES (:id_public, :pseudonym, :mail_adress, :password, NOW())"
    );

    $statement->bindParam(':id_public', $userIdPublic, PDO::PARAM_STR);
    $statement->bindParam(':pseudonym', $userPseudonym, PDO::PARAM_STR);
    $statement->bindParam(':mail_adress', $userMailAdress, PDO::PARAM_STR);
    $statement->bindParam(':password', $userPassword, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserPseudonym($userId, $userPseudonym)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE users SET pseudonym = :pseudonym WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':pseudonym', $userPseudonym, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserMailAdress($userId, $userMailAdress)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE users SET mail_adress = :mail_adress WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':mail_adress', $userMailAdress, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserPassword($userId, $userPassword)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE users SET password = :password WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':password', $userPassword, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserAvatar($userId, $userAvatar)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE users SET avatar = :avatar WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':avatar', $userAvatar, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserDescription($userId, $userDescription)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE users SET description = :description WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':description', $userDescription, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserResetPasswordToken($userId, $userResetPasswordToken)
{
    $database = dbConnect();

    if ($userResetPasswordToken == null) {
        $statement = $database->prepare(
            "UPDATE users SET reset_password_token = :reset_password_token, reset_password_token_creation_date = NULL WHERE id = :id"
        );
    } else {
        $statement = $database->prepare(
            "UPDATE users SET reset_password_token = :reset_password_token, reset_password_token_creation_date = NOW() WHERE id = :id"
        );
    }

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':reset_password_token', $userResetPasswordToken, PDO::PARAM_STR);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function updateUserLastConnexion($userId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "UPDATE users SET last_connexion = NOW() WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}

function deleteUser($userId)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "DELETE FROM users WHERE id = :id"
    );

    $statement->bindParam(':id', $userId, PDO::PARAM_INT);

    $statement->execute();

    $database = null;

    return $statement->rowCount();
}