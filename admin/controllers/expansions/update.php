<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/expansions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countExpansion($expansionIdPublic)) {
    $expansion = getExpansion($expansionIdPublic);

    if (isset($_POST['updateExpansionSubmit'])) {
        $expansionTitle = validationInput($_POST['expansionTitle']);
        $expansionSlug = slugify($_POST['expansionSlug']);
        $expansionSlug = validationInput($expansionSlug);
        $expansionDescription = validationInput($_POST['expansionDescription']);
        $expansionReleaseDate = validationInput($_POST['expansionReleaseDate']);

        if (empty($expansionTitle)) {
            $message = "Veuillez ajouter un titre à l'extension";
            $expansionUpdated = false;
        } elseif (empty($expansionSlug)) {
            $message = "Veuillez ajouter un slug à l'extension";
            $expansionCreated = false;
        } elseif (countExpansion($expansionSlug, $expansion['id']) != 0) {
            $message = "Ce slug est déjà utilisé";
            $expansionCreated = false;
        } elseif (empty($expansionDescription)) {
            $message = "Veuillez ajouter une description à l'extension";
            $expansionUpdated = false;
        } elseif (empty($expansionReleaseDate)) {
            $message = "Veuillez ajouter une date de sortie à l'extension";
            $expansionUpdated = false;
        } else {
            if ($_FILES['expansionIllustration']['error'] != 4) {
                if (!checkErrorUploadFile($_FILES['expansionIllustration'])) {
                    if (!checkImageTypeUploadFile($_FILES['expansionIllustration'])) {
                        $message = "extension de fichier non autorisé";
                        $expansionUpdated = false;
                    } else {
                        $folder = $_SERVER['DOCUMENT_ROOT']."/public/img/expansions/";
            
                        $extension = checkImageTypeUploadFile($_FILES['expansionIllustration']);
                        $expansionIllustration = makeIdPublic() . $extension;
                        move_uploaded_file($_FILES['expansionIllustration']['tmp_name'], $folder . $expansionIllustration);
            
                        if (updateExpansion($expansion['id'], $expansionSlug, $expansionTitle, $expansionIllustration, $expansionDescription, $expansionReleaseDate)) {
                            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/expansions/".$expansion['illustration']);
                            $expansionUpdated = true;
                            header('Location: /administration/extensions');
                            exit();
                        } else {
                            $message = "Inconnue";
                            $expansionUpdated = false;
                        }
                    }
                } else {
                    $message = checkErrorUploadFile($_FILES['expansionIllustration']);
                    $expansionUpdated = false;
                }
            } else {
                if (updateExpansion($expansion['id'], $expansionSlug, $expansionTitle, $expansion['illustration'], $expansionDescription, $expansionReleaseDate)) {
                    $expansionUpdated = true;
                    header('Location: /administration/extensions');
                    exit();
                } else {
                    $message = "Inconnue";
                    $expansionUpdated = false;
                }
            }
        }
    }

    $expansion = getExpansion($expansionIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/expansions/update.php');
} else {
    header('Location: /administration/extensions');
    exit();
}