<?php $title = $company['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/entreprises">Retourner sur la liste des entreprises</a>
        </div>
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $company['title']; ?></strong></h1>

        <p class="mb-2"><?= $company['description']; ?></p>

        <p class="mb-2">Date de création : <?= creationDateLittleEndian($company['creation_date']); ?></p>

        <img class="img-fluid rounded mb-4" src="/public/img/compagnies/<?= $company['illustration']; ?>">
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>




