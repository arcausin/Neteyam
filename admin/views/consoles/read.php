<?php $title = $console['name'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/consoles">Retourner sur la liste des consoles</a>
        </div>
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $console['name']; ?></strong></h1>

        <span class="badge badge-<?= $console['color']; ?> py-2 mb-1"><?= $console['name']; ?></span>

        <p class="mb-2"><?= $console['description']; ?></p>

        <p class="mb-2">Date de sortie : <?= creationDateLittleEndian($console['release_date']); ?></p>

        <img class="img-fluid rounded mb-4" src="/public/img/consoles/<?= $console['illustration']; ?>">
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>




