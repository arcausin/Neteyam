<?php
if (!empty($_SESSION['user'])) {
  header('Location: /administration/');
  exit();
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config/apiKeys.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createUserSubmit'])) {
    $userPseudonym = validationInput($_POST['userPseudonym']);
    $userMailAdress = validationInput($_POST['userMailAdress']);
    $adminKey = validationInput($_POST['adminKey']);
    $userPassword = validationInput($_POST['userPassword']);
    $userPasswordConfirm = validationInput($_POST['userPasswordConfirm']);

    if (empty($userPseudonym)) {
        $message = "Veuillez ajouter un pseudo";
        $userCreated = false;
    } elseif (countUserPseudonym($userPseudonym) != 0) {
        $message = "Ce Pseudo est déjà utilisée";
        $userCreated = false;
    } elseif (empty($userMailAdress)) {
        $message = "Veuillez ajouter une adresse mail";
        $userCreated = false;
    } elseif (countUserMailAdress($userMailAdress) != 0) {
        $message = "Cette adresse mail est déjà utilisée";
        $userCreated = false;
    } elseif ($adminKey != $keyRegister) {
        $message = "La clé d'administration est incorrecte";
        $userCreated = false;
    } elseif (empty($userPassword)) {
        $message = "Veuillez ajouter un mot de passe";
        $userCreated = false;
    } elseif (empty($userPasswordConfirm)) {
        $message = "Veuillez confirmer votre mot de passe";
        $userCreated = false;
    } elseif ($userPassword != $userPasswordConfirm) {
        $message = "Les mots de passe ne correspondent pas";
        $userCreated = false;
    } else {
        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
        
        $userIdPublic = makeIdPublic();
        
        if (addUser($userIdPublic, $userPseudonym, $userMailAdress, $userPasswordHash)) {
            $userCreated = true;
        } else {
            $message = "Inconnue";
            $userCreated = false;
        }
    }
}

if (isset($userCreated)) {
    if ($userCreated) {
        header('Location: /administration/connexion');
        exit();
    } else {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/register.php');
    }
} else {
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/register.php');
}