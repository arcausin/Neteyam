<?php $title = "Accueil - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les contenus de Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-8 mt-3">
        <h1 class="mb-3">Accueil</h1>

        <?php if ($lastNews) { ?>
            <div class="mb-3">
                <a href="/actualites"><span class="badge text-bg-primary py-2 fs-2 animate-opacity"><h2 class="rajdhani fs-2 mb-0 fw-bold">Actualités</h2></span></a>
            </div>

            <div class="row g-3 mb-3">
                <?php foreach ($lastNews as $lastNew) { ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $lastNew['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastNew['illustration']; ?>" alt="">

                            <div class="p-2">
                                <h3 class="fs-6"><?= $lastNew['title']; ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($lastReviews) { ?>
            <div class="mb-3">
                <a href="/tests"><span class="badge text-bg-success py-2 fs-2 animate-opacity"><h2 class="rajdhani fs-2 mb-0 fw-bold">Tests</h2></span></a>
            </div>

            <div class="row g-3 mb-3">
                <?php foreach ($lastReviews as $lastReview) { ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $lastReview['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastReview['illustration']; ?>" alt="">

                            <div class="p-2">
                                <h3 class="fs-6"><?= $lastReview['title']; ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($lastGuides) { ?>
            <div class="mb-3">
                <a href="/guides"><span class="badge text-bg-danger py-2 fs-2 animate-opacity"><h2 class="rajdhani fs-2 mb-0 fw-bold">Guides</h2></span></a>
            </div>

            <div class="row g-3 mb-3">
                <?php foreach ($lastGuides as $lastGuide) { ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $lastGuide['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastGuide['illustration']; ?>" alt="">

                            <div class="p-2">
                                <h3 class="fs-6"><?= $lastGuide['title']; ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($lastFeatures) { ?>
            <div class="mb-3">
                <a href="/dossiers"><span class="badge text-bg-warning py-2 fs-2 animate-opacity"><h2 class="rajdhani fs-2 mb-0 fw-bold">Dossiers</h2></span></a>
            </div>

            <div class="row g-3 mb-3">
                <?php foreach ($lastFeatures as $lastFeature) { ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $lastFeature['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastFeature['illustration']; ?>" alt="">

                            <div class="p-2">
                                <h3 class="fs-6"><?= $lastFeature['title']; ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <div class="col-12 col-lg-4 mt-3">
        <?php if ($lastGames || $nextGames) { ?>
            <div class="mb-3">
                <a href="/jeux"><span class="badge text-bg-light py-2 fs-2 animate-opacity"><h2 class="rajdhani fs-2 mb-0 fw-bold">Jeux</h2></span></a>
            </div>

            <div class="row g-3 mb-3">
                <?php foreach (array_reverse($lastGames) as $lastGame) { ?>
                <div class="col-6 col-md-3 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $lastGame['id_public']; ?>">
                            <img class="img-fluid rounded" src="/public/img/games/<?= $lastGame['illustration']; ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php } ?>

                <?php foreach ($nextGames as $nextGame) { ?>
                <div class="col-6 col-md-3 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $nextGame['id_public']; ?>">
                            <img class="img-fluid rounded" src="/public/img/games/<?= $nextGame['illustration']; ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>