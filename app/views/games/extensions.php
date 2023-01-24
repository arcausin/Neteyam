<?php $title = "Extensions - " . $game['title'] . " - Neteyam.com"; ?>

<?php $description = "Retrouvez toutes les extensions du jeu " . $game['title'] . " de Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/expansions/" . $game['illustration']; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/jeux/">Jeux</a> > <a class="text-white animate-opacity" href="/jeux/<?= $game['id_public']; ?>"><?= $game['title']; ?></a> > Extensions</p>

    <h1 class="text-center text-md-start fs-2 mb-3">Extensions - <?= $game['title']; ?></h1>

    <div class="text-center text-md-start mb-3">
        <a href="/jeux/<?= $game['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 opacity-mid">Jeu</span></a>
        <?php if ($numberExpansionsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/extensions"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity">Extensions</span></a>
        <?php endif ?>
        <?php if ($numberNewsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/actualites"><span class="badge text-bg-primary py-2 fs-6 opacity-mid">Actualités</span></a>
        <?php endif ?>

        <?php if ($numberReviewsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/tests"><span class="badge text-bg-success py-2 fs-6 opacity-mid">Tests</span></a>
        <?php endif ?>

        <?php if ($numberGuidesByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/guides"><span class="badge text-bg-danger py-2 fs-6 opacity-mid">Guides</span></a>
        <?php endif ?>

        <?php if ($numberFeaturesByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/dossiers"><span class="badge text-bg-warning py-2 fs-6 opacity-mid">Dossiers</span></a>
        <?php endif ?>
    </div>

    <div class="row">
        <?php
        foreach ($expansions as $expansion) {
        ?>
        <h2 class="text-center text-md-start mb-3"><?= $expansion['title']; ?></h2>

        <div class="col-12 col-md-6 col-lg-3 text-center text-md-start mb-3">
            <img class="img-fluid rounded" src="/public/img/expansions/<?= $expansion['illustration']; ?>">
        </div>

        <div class="col-12 col-md-6 col-lg-9 mb-5">
            <p class="text-center text-md-start mb-3"><?= $expansion['description']; ?></p>

            <p class="text-center text-md-start mb-0">Date de sortie : <?= creationDateLittleEndian($expansion['release_date']); ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>