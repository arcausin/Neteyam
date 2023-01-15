<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

function addMailForm($mailAdressContact, $subjectContact, $messageContact)
{
    $database = dbConnect();

    $statement = $database->prepare(
        "INSERT INTO mail_form (mail_adress, subject, message, creation_date) VALUES (:mail_adress, :subject, :message, NOW())"
    );

    $statement->bindParam(':mail_adress', $mailAdressContact, PDO::PARAM_STR);
    $statement->bindParam(':subject', $subjectContact, PDO::PARAM_STR);
    $statement->bindParam(':message', $messageContact, PDO::PARAM_STR);

    $statement->execute();
    
    $database = null;

    return $statement->rowCount();
}