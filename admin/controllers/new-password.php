<?php
if (!empty($_SESSION['user'])) {
  header('Location: /administration/');
  exit();
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (!empty($userResetToken)) {
    if (countUserResetPasswordToken($userResetToken) != 0) {
        // le token correspond a au moins un compte
        if (countUserResetPasswordToken($userResetToken) == 1) {
            // le token correspond a un compte
            if (getUserByResetPasswordToken($userResetToken)) {
                $user = getUserByResetPasswordToken($userResetToken);
                if (isset($_POST['updatePasswordUserSubmit'])) {
                    $userPassword = validationInput($_POST['userPassword']);
                    $userPasswordConfirm = validationInput($_POST['userPasswordConfirm']);

                    if (empty($userPassword)) {
                        $message = "Veuillez ajouter un mot de passe";
                        $passwordUpdated = false;
                    } elseif (empty($userPasswordConfirm)) {
                        $message = "Veuillez confirmer votre mot de passe";
                        $passwordUpdated = false;
                    } elseif ($userPassword != $userPasswordConfirm) {
                        $message = "Les mots de passe ne correspondent pas";
                        $passwordUpdated = false;
                    } else {
                        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
                        
                        if (updateUserResetPasswordToken($user['id'], null)) {
                            if (updateUserPassword($user['id'], $userPasswordHash)) {
                                $passwordUpdated = true;
                            } else {
                                $message = "Mise à jour du mot de passe impossible";
                                $passwordUpdated = false;
                            }
                        } else {
                            $message = "Suppression du token impossible";
                            $passwordUpdated = false;
                        }
                    }
                }
            } else {
                $message = "Impossible de récupérer les informations de l'utilisateur";
                $passwordUpdated = false;
            }
        } else {
            $message = "le token correspond a plusieurs comptes";
            $passwordUpdated = false;
        }
    } else {
        $message = "le token ne correspond a aucun compte";
        $passwordUpdated = false;
    }
}

if (isset($passwordUpdated)) {
    if ($passwordUpdated) {
        header('Location: /administration/connexion/');
        exit();
    } else {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/new-password.php');
    }
} else {
    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/new-password.php');
}