<?php $title = "Supprimer le jeu " . $game['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/jeux">Retourner sur la liste des jeux</a>
        </div>

        <?php if (isset($gameDeleted)) : ?>
            <?php if ($gameDeleted == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Suppression du jeu échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php else: ?>
            <h1 class="h3 mb-2 text-gray-800">Supprimer le jeu <strong><?= $game['title']; ?></strong></h1>

            <p class="mb-2"><?= $game['description']; ?></p>

            <p class="mb-2">Date de sortie : <?= creationDateLittleEndian($game['release_date']); ?></p>

            <img class="img-fluid rounded mb-2" src="/public/img/games/<?= $game['illustration']; ?>">

            <form class="mb-4" action="" method="post">
                <button type="submit" class="btn btn-danger" name="deleteGameSubmit">Supprimer</button>
            </form>
        <?php endif ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>