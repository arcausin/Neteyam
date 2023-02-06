<?php $title = $game['title'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/jeux">Retourner sur la liste des jeux</a>
        </div>
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $game['title']; ?></strong></h1>

        <p class="mb-2"><?= $game['description']; ?></p>

        <p class="mb-2">Date de sortie : <?= creationDateLittleEndian($game['release_date']); ?></p>

        <img class="img-fluid rounded mb-4" src="/public/img/games/<?= $game['illustration']; ?>">
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>