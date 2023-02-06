<?php $title = "Actualités - " . $game['title'] . " - " . ucfirst($host); ?>

<?php $description = "Retrouvez toutes les actualités du jeu " . $game['title'] . " référencées sur " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/games/" . $game['illustration']; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/jeux/">Jeux</a> > <a class="text-white animate-opacity" href="/jeux/<?= $game['id_public']; ?>"><?= $game['title']; ?></a> > Actualités</p>

    <h1 class="text-center text-md-start fs-2 mb-3">Actualités - <?= $game['title']; ?></h1>

    <div class="text-center text-md-start mb-3">
        <a href="/jeux/<?= $game['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 opacity-mid">Jeu</span></a>
        <?php if ($numberExpansionsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/extensions"><span class="badge text-bg-secondary py-2 fs-6 opacity-mid">Extensions</span></a>
        <?php endif ?>
        <?php if ($numberNewsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/actualites"><span class="badge text-bg-primary py-2 fs-6 animate-opacity">Actualités</span></a>
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
        foreach ($news as $new) {
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $new['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/articles/<?= $new['illustration']; ?>" alt="">

                    <div class="p-2">
                        <h3 class="fs-6 mb-3"><?= $new['title']; ?></h3>
                    </div>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>