<?php $title = $developer['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/developpeurs">Retourner sur la liste des développeurs</a>
        </div>
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $developer['title']; ?></strong></h1>

        <p class="mb-2"><?= $developer['description']; ?></p>

        <p class="mb-2">Date de création : <?= creationDateLittleEndian($developer['creation_date']); ?></p>

        <img class="img-fluid rounded mb-4" src="/public/img/developers/<?= $developer['illustration']; ?>">
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>




