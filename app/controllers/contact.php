<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/mail_form.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (isset($_POST['contactSubmit'])) {
    $mailAdressContact = validationInput($_POST['mailAdressContact']);
    $subjectContact = validationInput($_POST['subjectContact']);
    $messageContact = validationInput($_POST['messageContact']);
  
    if (empty($mailAdressContact)) {
        $message = "Veuillez entrer une adresse mail";
        $mailSended = false;
    } elseif (empty($subjectContact)) {
        $message = "Veuillez entrer un sujet";
        $mailSended = false;
    } elseif (empty($messageContact)) {
        $message = "Veuillez entrer un message";
        $mailSended = false;
    } elseif ($_POST['questionContact'] != 2) {
        $message = "La réponse à la question de sécurité est incorrecte";
        $mailSended = false;
    } else {
        $subjectTo = "Confirmation de réception de formulaire de contact";
  
        ob_start(); ?>
        <html>
            <head>
            <title>Confirmation de réception de formulaire de contact</title>
            </head>
            <body>
                <h1>Confirmation de réception de formulaire de contact</h1>
                <p>Bonjour, <br/><br/>
                Nous avons bien reçu votre formulaire de contact et nous vous en remercions. Nous allons traiter votre demande dans les plus brefs délais. <br/>
                Voici le message que nous avons reçu de votre part : <br/> <br/>
                Sujet : <?= $subjectContact; ?> <br/>
                Message : <?= $messageContact; ?></p>
                <p><i>Si vous n'êtes pas à l'origine de cette activité, veuillez <a href="<?= $urlNative; ?>/contact">nous contacter</a>.</i></p>
                <p>Cordialement</p>
                <p><a href="<?= $urlNative; ?>"><?= ucfirst($host); ?></a></p>
            </body>
        </html>
        <?php $messageTo = ob_get_clean();

        $subjectFrom = "Nouveau message de contact - " . ucfirst($host);
        
        ob_start(); ?>
        <html>
            <head>
            <title>Nouveau message de contact - <?= ucfirst($host); ?></title>
            </head>
            <body>
                <h1>Nouveau message de contact - <?= ucfirst($host); ?></h1>
                <p>Bonjour, <br/><br/>
                Voici le message que vous avez reçu de la part de <?= $mailAdressContact; ?> : <br/> <br/>
                Sujet : <?= $subjectContact; ?> <br/>
                Message : <?= $messageContact; ?></p>
                <p>Cordialement</p>
                <p><a href="<?= $urlNative; ?>"><?= ucfirst($host); ?></a></p>
            </body>
        </html>
        <?php $messageFrom = ob_get_clean();

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-Type: text/html; charset=utf-8';
        $headers[] = 'From: Neteyam.com <contact@neteyam.com>';

        if (mail("contact@neteyam.com, arcausin@neteyam.com, arcausin@gmail.com", $subjectFrom, $messageFrom, implode("\r\n", $headers))) {
            if (mail($mailAdressContact, $subjectTo, $messageTo, implode("\r\n", $headers))) {
                if (addMailForm($mailAdressContact, $subjectContact, $messageContact)) {
                    $mailSended = true;
                    $mailAdressContact = null;
                    $subjectContact = null;
                    $messageContact = null;
                } else {
                    $message = "Envoi du mail echoué";
                    $mailSended = false;
                }
                
            } else {
                $message = "Envoi du mail echoué";
                $mailSended = false;
            }
        } else {
            $message = "Envoi du mail echoué";
            $mailSended = false;
        }

        
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/contact.php');