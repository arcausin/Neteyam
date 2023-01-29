<?php $title = $company['title'] . " - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les contenus de l'entreprise " . $company['title'] . " référencés sur Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/games/" . $company['illustration']; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/entreprises">Entreprises</a> > <?= $company['title']; ?></p>

    <h1 class="text-center text-md-start fs-2 mb-3"><?= $company['title']; ?></h1>
            
    <div class="text-center text-md-start mb-3">
        <a href="/entreprises/<?= $company['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 animate-opacity">Entreprise</span></a>
        <?php if ($numberGamesByDevelopers != 0) : ?>
            <a href="/entreprises/<?= $company['id_public']; ?>/developpement"><span class="badge text-bg-secondary py-2 fs-6 opacity-mid">Développement</span></a>
        <?php endif ?>
        <?php if ($numberGamesByPublishers != 0) : ?>
            <a href="/entreprises/<?= $company['id_public']; ?>/edition"><span class="badge text-bg-secondary py-2 fs-6 opacity-mid">Édition</span></a>
        <?php endif ?>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
            <img class="img-fluid rounded p-3 bg-light mb-3" src="/public/img/compagnies/<?= $company['illustration']; ?>">
        </div>

        <div class="col-12 col-md-6 col-lg-9">
            <p class="text-center text-md-start mb-3"><?= $company['description']; ?></p>

            <p class="text-center text-md-start mb-0">Date de création : <?= creationDateLittleEndian($company['creation_date']); ?></p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>