<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/expansions.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/functions.php');

if (countExpansion($expansionIdPublic)) {
    $expansion = getExpansion($expansionIdPublic);

    if (isset($_POST['deleteExpansionSubmit'])) {

        if (deleteExpansion($expansion['id'])) {
            unlink($_SERVER['DOCUMENT_ROOT']."/public/img/expansions/".$expansion['illustration']);
            $expansionDeleted = true;
            header('Location: /administration/extensions');
            exit();
        } else {
            $message = "Inconnue";
            $expansionDeleted = false;
        }
    }

    require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/expansions/delete.php');
} else {
    header('Location: /administration/extensions');
    exit();
}