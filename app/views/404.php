<?php $title = "404 - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="text-center mt-3 mb-3">
    <h1 class="fs-1 mb-3">404</h1>
    <p class="mb-3">Page non trouvée</p>
    <p class="mb-3">Il semble que vous ayez trouvé un bug dans la matrice...</p>
    <a class="text-white animate-opacity" href="/">Retour à l'accueil</a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>