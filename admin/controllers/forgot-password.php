<?php
if (!empty($_SESSION['user'])) {
  header('Location: /administration/');
  exit();
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/users.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['resetPasswordUserSubmit'])) {
  $userMailAdress = validationInput($_POST['userMailAdress']);

  if (empty($userMailAdress)) {
      $message = "Veuillez entrer une adresse mail";
      $mailSended = false;
  } else {
      if (countUserMailAdress($userMailAdress) != 0) {
          // l'adresse mail correspond a au moins un compte
          if (countUserMailAdress($userMailAdress) == 1) {
            // l'adresse mail correspond a un compte
            if (getUserByMailAdress($userMailAdress)) {
              $user = getUserByMailAdress($userMailAdress);
              if (empty($user['reset_token'])) {
                $user['reset_token'] = makeIdPublic();
                
                if (!updateUserResetPasswordToken($user['id'], $user['reset_token'])) {
                  $message = "generation du token echoué";
                  $mailSended = false;
                }
              }

              $subject = "Lien de réinitialisation de mot de passe - " . ucfirst($host);

              ob_start(); ?>
              <html>
                <head>
                  <title><?= $subject; ?></title>
                </head>
                <body>
                  <h1><?= $subject; ?></h1>
                  <p>Vous avez demandé à réinitialiser votre mot de passe sur le tableau de bord de <?= ucfirst($host); ?>, cliquez sur le lien ci-dessous pour le faire.</p>
                  <a href="<?= $urlNative; ?>/administration/nouveau-mot-de-passe/<?= $user['reset_token']; ?>">Réinitialiser mon mot de passe</a>
                  <p>Si vous n'avez pas demandé à réinitialiser votre mot de passe, ignorez cet email.</p>
                </body>
              </html>
              <?php $message = ob_get_clean();

              $headers[] = 'MIME-Version: 1.0';
              $headers[] = 'Content-Type: text/html; charset=utf-8';

              if (mail($userMailAdress, $subject, $message, implode("\r\n", $headers))) {
                $mailSended = true;
              } else {
                $message = "Envoi du mail echoué";
                $mailSended = false;
              }
            } else {
              $message = "Impossible de récupérer les informations de l'utilisateur";
              $mailSended = false;
            }
          } else {
              $message = "l'adresse mail correspond a plusieurs comptes";
              $mailSended = false;
          }
      } else {
          $message = "l'adresse mail ne correspont a aucun compte";
          $mailSended = false;
      }
  }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/forgot-password.php');