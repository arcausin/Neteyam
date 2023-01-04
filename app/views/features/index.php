<?php $title = "Dossiers - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les dossiers de Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Dossiers</p>

    <div class="mb-3">
        <a href="/dossiers"><span class="badge text-bg-warning py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Dossiers</h1></span></a>
    </div>

    <div class="row">
    <?php
        foreach ($features as $feature) {
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/dossiers/<?= $feature['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/articles/<?= $feature['illustration']; ?>" alt="">

                    <div class="p-2">
                        <h3 class="fs-6"><?= $feature['title']; ?></h3>
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