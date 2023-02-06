<?php $title = "Thèmes - " . ucfirst($host); ?>

<?php $description = "Retrouvez tous les thèmes référencés sur " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Thèmes</p>

    <div class="mb-3">
        <a href="/themes"><span class="badge text-bg-light py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Thèmes</h1></span></a>
    </div>

    <div class="row">
        <div class="text-center text-md-start mb-3">
            <?php
            foreach ($themes as $theme) {
            ?>
                <a href="/themes/<?= $theme['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity mb-1"><?= $theme['name']; ?></span></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>