<?php $title = "Guides - " . ucfirst($host); ?>

<?php $description = "Retrouvez tous les guides de " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Guides</p>

    <div class="mb-3">
        <a href="/guides"><span class="badge text-bg-danger py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Guides</h1></span></a>
    </div>

    <div class="row g-4">
    <?php
        foreach ($guides as $guide) {
            $gamesGuide = getGamesByArticle($guide['id_public']);
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/guides/<?= $guide['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/articles/<?= $guide['illustration']; ?>" alt="">

                    <div class="p-3">
                        <div class="mb-1">
                            <?php
                            foreach ($gamesGuide as $gameGuide) {
                            ?>
                            <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameGuide['title']; ?></span>
                            <?php
                            }
                            ?>
                        </div>
                        <h3 class="fs-6 mb-0"><?= $guide['title']; ?></h3>
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