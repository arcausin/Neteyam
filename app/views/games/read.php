<?php $title = $game['title'] . " - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les contenus du jeu " . $game['title'] . " référencés sur Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/games/" . $game['illustration']; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="/jeux">Jeux</a> > <?= $game['title']; ?></p>

    <h1 class="text-center text-md-start fs-2 mb-3"><?= $game['title']; ?></h1>
            
    <div class="text-center text-md-start mb-3">
        <a href="/jeux/<?= $game['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 animate-opacity">Jeu</span></a>
        <?php if ($numberExpansionsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/extensions"><span class="badge text-bg-secondary py-2 fs-6 opacity-mid">Extensions</span></a>
        <?php endif ?>
        <?php if ($numberNewsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/actualites"><span class="badge text-bg-primary py-2 fs-6 opacity-mid">Actualités</span></a>
        <?php endif ?>

        <?php if ($numberReviewsByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/tests"><span class="badge text-bg-success py-2 fs-6 opacity-mid">Tests</span></a>
        <?php endif ?>

        <?php if ($numberGuidesByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/guides"><span class="badge text-bg-danger py-2 fs-6 opacity-mid">Guides</span></a>
        <?php endif ?>

        <?php if ($numberFeaturesByGame != 0) : ?>
            <a href="/jeux/<?= $game['id_public']; ?>/dossiers"><span class="badge text-bg-warning py-2 fs-6 opacity-mid">Dossiers</span></a>
        <?php endif ?>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-md-6 col-lg-3 text-center text-md-start">
            <img class="img-fluid rounded mb-3" src="/public/img/games/<?= $game['illustration']; ?>">
        </div>

        <div class="col-12 col-md-6 col-lg-9">
            <?php if (!empty($developersGame) || !empty($publishersGame)) { $companyName = []; ?>
                <div class="text-center text-md-start mb-3">
                    <?php foreach ($developersGame as $developerGame) {
                        if (!in_array($developerGame['title'], $companyName)) { ?>
                            <a href="/entreprises/<?= $developerGame['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 animate-opacity mb-1"><?= $developerGame['title']; ?></span></a>
                    <?php array_push($companyName, $developerGame['title']); } } ?>

                    <?php foreach ($publishersGame as $publisherGame) {
                        if (!in_array($publisherGame['title'], $companyName)) { ?>
                            <a href="/entreprises/<?= $publisherGame['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 animate-opacity mb-1"><?= $publisherGame['title']; ?></span></a>
                    <?php array_push($companyName, $publisherGame['title']); } } ?>
                </div>
            <?php } ?>

            <?php if (!empty($consolesGame)) { ?>
                <div class="text-center text-md-start mb-3">
                    <?php foreach ($consolesGame as $consoleGame) { ?>
                        <a href="/consoles/<?= $consoleGame['id_public']; ?>"><span class="badge text-bg-<?= $consoleGame['color']; ?> py-2 fs-6 animate-opacity mb-1"><?= $consoleGame['name']; ?></span></a>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (!empty($genresGame) || !empty($themesGame)) { ?>
                <div class="text-center text-md-start mb-3">
                    <?php foreach ($genresGame as $genreGame) { ?>
                        <a href="/genres/<?= $genreGame['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity mb-1"><?= $genreGame['name']; ?></span></a>
                    <?php } ?>

                    <?php foreach ($themesGame as $themeGame) { ?>
                        <a href="/themes/<?= $themeGame['id_public']; ?>/jeux"><span class="badge text-bg-secondary py-2 fs-6 animate-opacity mb-1"><?= $themeGame['name']; ?></span></a>
                    <?php } ?>
                </div>
            <?php } ?>

            <p class="text-center text-md-start mb-3"><?= $game['description']; ?></p>

            <p class="text-center text-md-start mb-0">Date de sortie : <?= creationDateLittleEndian($game['release_date']); ?></p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>