<?php $title = "Consoles - Neteyam.com"; ?>

<?php $description = "Retrouvez toutes les consoles référencées sur Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Consoles</p>

    <div class="mb-3">
        <a href="/consoles"><span class="badge text-bg-light py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Consoles</h1></span></a>
    </div>

    <div class="row g-4 mb-3">
        <?php
        foreach ($consoles as $console) {
        ?>
        <div class="col-6 col-md-3 col-lg-2">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/consoles/<?= $console['id_public']; ?>">
                    <!-- <img class="img-fluid rounded" src="/public/img/consoles/<?= $console['illustration']; ?>" alt=""> -->
                </a>
            </div>
            <div class="text-center">
                <a href="/consoles/<?= $console['id_public']; ?>"><span class="badge text-bg-<?= $console['color']; ?> py-2 fs-6 animate-opacity mb-1"><?= $console['name']; ?></span></a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>