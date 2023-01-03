<?php $title = $game['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/jeux/">Jeux</a> > <?= $game['title']; ?></p>

    <h1 class="text-center text-md-start fs-2 mb-3"><?= $game['title']; ?></h1>
            
    <div class="text-center text-md-start mb-3">
        <a href="/jeux/<?= $game['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 animate-opacity">Jeu</span></a>
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

    <div class="row mb-3">
        <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
            <img class="img-fluid rounded mb-3" src="/public/img/games/<?= $game['illustration']; ?>">
        </div>

        <div class="col-12 col-md-6 col-lg-9">
            <p class="text-center text-md-start mb-3"><?= $game['description']; ?></p>

            <p class="text-center text-md-start mb-0">Date de sortie : <?= creationDateLittleEndian($game['release_date']); ?></p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>