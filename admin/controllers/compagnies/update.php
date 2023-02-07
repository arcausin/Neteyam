<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countCompany($companyIdPublic)) {
    $company = getCompany($companyIdPublic);

    if (isset($_POST['updateCompanySubmit'])) {
        $companyTitle = validationInput($_POST['companyTitle']);
        $companySlug = slugify($_POST['companySlug']);
        $companySlug = validationInput($companySlug);
        $companyDescription = validationInput($_POST['companyDescription']);
        $companyCreationDate = validationInput($_POST['companyCreationDate']);

        if (empty($companyTitle)) {
            $message = "Veuillez ajouter un titre à l'entreprise";
            $companyUpdated = false;
        } elseif (empty($companySlug)) {
            $message = "Veuillez ajouter un slug à l'entreprise";
            $companyCreated = false;
        } elseif (countCompany($companySlug, $company['id']) != 0) {
            $message = "Le slug existe déjà";
            $companyCreated = false;
        } elseif (empty($companyDescription)) {
            $message = "Veuillez ajouter une description à l'entreprise";
            $companyUpdated = false;
        } elseif (empty($companyCreationDate)) {
            $message = "Veuillez ajouter une date de création à l'entreprise";
            $companyUpdated = false;
        } else {
            if ($_FILES['companyIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['companyIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['companyIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $companyUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/compagnies/";
            
                        $extension = checkImageTypeUploadFile($_FILES['companyIllustration']);
                        $companyIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['companyIllustration']['tmp_name'], $folder . $companyIllustration);
            
                        if (updateCompany($company['id'], $companySlug, $companyTitle, $companyIllustration, $companyDescription, $companyCreationDate)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/compagnies/".$company['illustration']);
                            $companyUpdated = true;
                            header('Location: /administration/entreprises');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $companyUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['companyIllustration']);
                    $companyUpdated = false;
                }
            } else {
                if (updateCompany($company['id'], $companySlug, $companyTitle, $company['illustration'], $companyDescription, $companyCreationDate)) {
                    $companyUpdated = true;
                    header('Location: /administration/entreprises');
                    exit();
                } else {
                    $message = "Inconnue";
                    $companyUpdated = false;
                }
            }
        }
    }

    $company = getCompany($companyIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/compagnies/update.php');
} else {
    header('Location: /administration/entreprises');
    exit();
}