<?php $title = "SB Admin 2 - 404"; ?>

<?php ob_start(); ?>
<!-- 404 Error Text -->
<div class="text-center">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Page non trouvée</p>
    <p class="text-gray-500 mb-0">Il semble que vous ayez trouvé un bug dans la matrice...</p>
    <a href="/">Retour au tableau de bord</a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>