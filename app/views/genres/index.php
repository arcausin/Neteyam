<?php $title = "Genres - " . ucfirst($host); ?>

<?php $description = "Retrouvez tous les genres référencés sur " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Genres</p>

    <div class="mb-3">
        <a href="/genres"><span class="badge text-bg-light py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Genres</h1></span></a>
    </div>

    <div class="row">
        <div class="text-center text-md-start mb-3">
            <?php
            foreach ($genres as $genre) {
            ?>
                <a href="/genres/<?= $genre['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity mb-1"><?= $genre['name']; ?></span></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>