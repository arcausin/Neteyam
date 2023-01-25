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

            <div class="row g-4 mb-3">
                <?php foreach ($lastNews as $lastNew) {
                    $gamesLastNew = getGamesByArticle($lastNew['id_public']);
                ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $lastNew['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastNew['illustration']; ?>" alt="">

                            <div class="p-3">
                                <div class="mb-1">
                                    <?php
                                    foreach ($gamesLastNew as $gameLastNew) {
                                    ?>
                                    <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameLastNew['title']; ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h3 class="fs-6 mb-0"><?= $lastNew['title']; ?></h3>
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

            <div class="row g-4 mb-3">
                <?php foreach ($lastReviews as $lastReview) {
                    $gamesLastReview = getGamesByArticle($lastReview['id_public']);
                ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/tests/<?= $lastReview['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastReview['illustration']; ?>" alt="">

                            <div class="p-3">
                                <div class="mb-1">
                                    <?php
                                    foreach ($gamesLastReview as $gameLastReview) {
                                    ?>
                                    <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameLastReview['title']; ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h3 class="fs-6 mb-0"><?= $lastReview['title']; ?></h3>
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

            <div class="row g-4 mb-3">
                <?php foreach ($lastGuides as $lastGuide) {
                    $gamesLastGuide = getGamesByArticle($lastGuide['id_public']);
                ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/guides/<?= $lastGuide['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastGuide['illustration']; ?>" alt="">

                            <div class="p-3">
                                <div class="mb-1">
                                    <?php
                                    foreach ($gamesLastGuide as $gameLastGuide) {
                                    ?>
                                    <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameLastGuide['title']; ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h3 class="fs-6 mb-0"><?= $lastGuide['title']; ?></h3>
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

            <div class="row g-4 mb-3">
                <?php foreach ($lastFeatures as $lastFeature) {
                    $gamesLastFeature = getGamesByArticle($lastFeature['id_public']);
                ?>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow rounded">
                        <a class="text-decoration-none text-white animate-opacity" href="/dossiers/<?= $lastFeature['id_public']; ?>">
                            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastFeature['illustration']; ?>" alt="">

                            <div class="p-3">
                                <div class="mb-1">
                                    <?php
                                    foreach ($gamesLastFeature as $gameLastFeature) {
                                    ?>
                                    <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameLastFeature['title']; ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h3 class="fs-6 mb-0"><?= $lastFeature['title']; ?></h3>
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

            <div class="row g-4 mb-3">
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