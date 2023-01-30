<?php $title = $console['name'] . " - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les contenus sur " . $console['name'] . " référencés sur Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/consoles">Consoles</a> > <?= $console['name']; ?></p>

    <h1 class="text-center text-md-start fs-2 mb-3"><?= $console['name']; ?></h1>

    <div class="text-center text-md-start mb-3">
        <a href="/consoles/<?= $console['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 animate-opacity">Console</span></a>
        <?php if ($numberGamesByConsole != 0) : ?>
            <a href="/consoles/<?= $console['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 opacity-mid">Jeux</span></a>
        <?php endif ?>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
            <img class="img-fluid rounded mb-3" src="/public/img/games/<?= $console['illustration']; ?>">
        </div>

        <div class="col-12 col-md-6 col-lg-9">
            <p class="text-center text-md-start mb-3"><?= $console['description']; ?></p>

            <p class="text-center text-md-start mb-0">Date de sortie : <?= creationDateLittleEndian($console['release_date']); ?></p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>