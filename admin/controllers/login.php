<?php
if (!empty($_SESSION['user'])) {
  header('Location: /administration/');
  exit();
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['connectUserSubmit'])) {
    $userMailAdress = validationInput($_POST['userMailAdress']);
    $userPassword = validationInput($_POST['userPassword']);

    if (empty($userMailAdress)) {
        $message = "Veuillez entrer une adresse mail";
        $userConnected = false;
    } elseif (empty($userPassword)) {
        $message = "Veuillez entrer un mot de passe";
        $userConnected = false;
    } else {
        if (countUserMailAdress($userMailAdress) != 0) {
            // l'adresse mail correspond a au moins un compte
            if (countUserMailAdress($userMailAdress) == 1) {
                // l'adresse mail correspond a un compte
                $user = getUserByMailAdress($userMailAdress);

                if (password_verify($userPassword, $user['password'])) {
                    // les deux mots de passe correspondent
                    updateUserLastConnexion($user['id']);
                    $_SESSION['user'] = $user;
                    $userConnected = true;
                } else {
                    $message = "les deux mots de passe ne correspondent pas";
                    $userConnected = false;
                }
            } else {
                $message = "l'adresse mail correspond a plusieurs comptes";
                $userConnected = false;
            }
        } else {
            $message = "l'adresse mail ne correspond a aucun compte";
            $userConnected = false;
        }
    }
}

if (isset($userConnected)) {
    if ($userConnected) {
        header('Location: /administration/');
        exit();
    } else {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/login.php');
    }
} else {
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/login.php');
}