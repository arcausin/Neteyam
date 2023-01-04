<?php $title = "Modifier le jeu " . $game['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/jeux">Retourner sur la liste des jeux</a>
        </div>

        <?php if (isset($gameUpdated)) : ?>
            <?php if ($gameUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification du jeu échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification du jeu <strong><?= $game['title']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gameTitle">Titre du jeu</label>
                <input type="text" class="form-control" id="gameTitle" name="gameTitle" maxlength="255" value="<?php if (!empty($game['title'])) : ?><?= $game['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="gameDescription">Description</label>
                <textarea class="form-control" id="gameDescription" name="gameDescription" rows="5" required><?php if (!empty($game['description'])) : ?><?= $game['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration du jeu</p>
                <img class="img-fluid rounded mb-2" src="/public/img/games/<?= $game['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="gameIllustration" name="gameIllustration">
                    <label class="custom-file-label" for="gameIllustration"><?php if (!empty($game['illustration'])) : ?><?= $game['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="gameReleaseDate">Date de sortie</label>
                <input type="date" class="form-control" id="gameReleaseDate" name="gameReleaseDate" value="<?php if (!empty($game['release_date'])) : ?><?= $game['release_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updateGameSubmit">Modifier</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("gameIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>