<?php $title = "Jeux - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Jeux</p>

    <div class="mb-3">
        <a href="/jeux"><span class="badge text-bg-light py-2 fs-2 animate-opacity">Jeux</span></a>
    </div>

    <div class="row">
        <?php
        foreach ($games as $game) {
        ?>
        <div class="col-6 col-md-3 col-lg-2 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $game['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/games/<?= $game['illustration']; ?>" alt="">

                    <div class="p-2">
                        <h3 class="fs-6 text-center shortcut-word"><?= $game['title']; ?></h3>
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