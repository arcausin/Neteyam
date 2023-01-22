<?php $title = "Actualités - Neteyam.com"; ?>

<?php $description = "Retrouvez toutes les actualités de Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Actualités</p>

    <div class="mb-3">
        <a href="/actualites"><span class="badge text-bg-primary py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Actualités</h1></span></a>
    </div>

    <div class="row g-3">
    <?php
        foreach ($news as $new) {
            $gamesNew = getGamesByArticle($new['id_public']);
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/actualites/<?= $new['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/articles/<?= $new['illustration']; ?>" alt="">

                    <div class="p-3">
                        <div class="mb-1">
                            <?php
                            foreach ($gamesNew as $gameNew) {
                            ?>
                            <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameNew['title']; ?></span>
                            <?php
                            }
                            ?>
                        </div>
                        <h3 class="fs-6 mb-0"><?= $new['title']; ?></h3>
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