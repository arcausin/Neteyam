<?php $title = $expansion['title'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/extensions">Retourner sur la liste des extensions</a>
        </div>
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $expansion['title']; ?></strong></h1>

        <p class="mb-2"><?= $expansion['description']; ?></p>

        <p class="mb-2">Date de sortie : <?= creationDateLittleEndian($expansion['release_date']); ?></p>

        <img class="img-fluid rounded mb-4" src="/public/img/expansions/<?= $expansion['illustration']; ?>">
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>




