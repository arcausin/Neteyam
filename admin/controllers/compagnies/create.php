<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (isset($_POST['createCompanySubmit'])) {
    $companyTitle = validationInput($_POST['companyTitle']);
    $companySlug = slugify($_POST['companySlug']);
    $companySlug = validationInput($companySlug);
    $companyDescription = validationInput($_POST['companyDescription']);
    $companyCreationDate = validationInput($_POST['companyCreationDate']);

    if (empty($companyTitle)) {
        $message = "Veuillez ajouter un titre à l'entreprise";
        $companyCreated = false;
    } elseif (empty($companySlug)) {
        $message = "Veuillez ajouter un slug à l'entreprise";
        $companyCreated = false;
    } elseif (countCompany($companySlug) != 0) {
        $message = "Le slug existe déjà";
        $companyCreated = false;
    } elseif (empty($companyDescription)) {
        $message = "Veuillez ajouter une description à l'entreprise";
        $companyCreated = false;
    } elseif (empty($companyCreationDate)) {
        $message = "Veuillez ajouter une date de création à l'entreprise";
        $companyCreated = false;
    } elseif (empty($_FILES['companyIllustration']['name'])) {
        $message = "Veuillez ajouter une illustration à l'entreprise";
        $companyCreated = false;
    } else {
        if (!checkErrorUploadFile($_FILES['companyIllustration'])) {
            if (!checkImageTypeUploadFile($_FILES['companyIllustration'])) {
                $message = "extension de fichier non autorisé";
                $companyCreated = false;
            } else {
                $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/compagnies/";

                $extension = checkImageTypeUploadFile($_FILES['companyIllustration']);
                $companyIllustration = makeIdPublic() . $extension;
                move_uploaded_file($_FILES['companyIllustration']['tmp_name'], $folder . $companyIllustration);

                $companyIdPublic = $companySlug;

                if (addCompany($companyIdPublic, $companyTitle, $companyIllustration, $companyDescription, $companyCreationDate)) {
                    $companyCreated = true;
                    header('Location: /administration/entreprises');
                    exit();
                } else {
                    $message = "Inconnue";
                    $companyCreated = false;
                }
            }
        } else {
            $message = checkErrorUploadFile($_FILES['companyIllustration']);
            $companyCreated = false;
        }
    }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/compagnies/create.php');