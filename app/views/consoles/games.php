<?php $title = "Jeux - " . $console['name'] . " - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les jeux sur " . $console['name'] . " référencés sur Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/consoles">Consoles</a> > <a class="text-white animate-opacity" href="/consoles/<?= $console['id_public']; ?>"><?= $console['name']; ?></a> > Jeux</p>

    <h1 class="text-center text-md-start fs-2 mb-3">Jeux - <?= $console['name']; ?></h1>

    <div class="text-center text-md-start mb-3">
        <a href="/consoles/<?= $console['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 opacity-mid">Console</span></a>
        <?php if ($numberGamesByConsole != 0) : ?>
            <a href="/consoles/<?= $console['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity">Jeux</span></a>
        <?php endif ?>
    </div>

    <div class="row g-4 mb-3">
        <?php
        foreach ($gamesConsole as $gameConsole) {
        ?>
        <div class="col-6 col-md-3 col-lg-2">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $gameConsole['id_public']; ?>">
                    <img class="img-fluid rounded" src="/public/img/games/<?= $gameConsole['illustration']; ?>" alt="">
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