<?php $title = "Édition - " . $company['title'] . " - " . ucfirst($host); ?>

<?php $description = "Retrouvez tous les jeux édités par " . $company['title'] . " référencés sur " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/compagnies/" . $company['illustration']; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/entreprises">Entreprises</a> > <a class="text-white animate-opacity" href="/entreprises/<?= $company['id_public']; ?>"><?= $company['title']; ?></a> > Édition</p>

    <h1 class="text-center text-md-start fs-2 mb-3">Édition - <?= $company['title']; ?></h1>
            
    <div class="text-center text-md-start mb-3">
        <a href="/entreprises/<?= $company['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 opacity-mid">Entreprise</span></a>
        <?php if ($numberGamesByDeveloper != 0) : ?>
            <a href="/entreprises/<?= $company['id_public']; ?>/developpement"><span class="badge text-bg-secondary py-2 fs-6 opacity-mid">Développement</span></a>
        <?php endif ?>
        <?php if ($numberGamesByPublisher != 0) : ?>
            <a href="/entreprises/<?= $company['id_public']; ?>/edition"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity">Édition</span></a>
        <?php endif ?>
    </div>

    <div class="row justify-content-center justify-content-md-start g-4 mb-3">
        <?php
        foreach ($gamesPublisher as $gamePublisher) {
        ?>
        <div class="col-6 col-md-3 col-lg-2">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $gamePublisher['id_public']; ?>">
                    <img class="img-fluid rounded" src="/public/img/games/<?= $gamePublisher['illustration']; ?>" alt="">
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