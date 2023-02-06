<?php $title = "Jeux - " . $genre['name'] . " - " . ucfirst($host); ?>

<?php $description = "Retrouvez tous les jeux sur le genre " . $genre['name'] . " référencés sur " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/genres">Genres</a> > <?= $genre['name']; ?> > Jeux</p>

    <h1 class="text-center text-md-start fs-2 mb-3">Jeux - <?= $genre['name']; ?></h1>

    <div class="text-center text-md-start mb-3">
        <span class="badge text-bg-light py-2 fs-6 opacity-mid">Genre</span>
        <?php if ($numberGamesByGenre != 0) : ?>
            <a href="/genres/<?= $genre['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity">Jeux</span></a>
        <?php endif ?>
    </div>
    
    <div class="row justify-content-center justify-content-md-start g-4 mb-3">
        <?php
        foreach ($gamesGenre as $gameGenre) {
        ?>
        <div class="col-6 col-md-3 col-lg-2">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $gameGenre['id_public']; ?>">
                    <img class="img-fluid rounded" src="/public/img/games/<?= $gameGenre['illustration']; ?>" alt="">
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