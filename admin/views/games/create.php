<?php $title = "Ajouter un jeu - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/jeux">Retourner sur la liste des jeux</a>
        </div>

        <?php if (isset($gameCreated)) : ?>
            <?php if ($gameCreated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ajout du jeu échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Ajouter un jeu</h1>

        <p class="mb-2">Formulaire d'ajout de jeu sur Neteyam.com</p>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gameTitle">Titre du jeu</label>
                <input type="text" class="form-control" id="gameTitle" name="gameTitle" maxlength="255" required>
            </div>

            <div class="form-group">
                <label for="gameDescription">Description</label>
                <textarea class="form-control" id="gameDescription" name="gameDescription" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration du jeu</p>
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="gameIllustration" name="gameIllustration">
                    <label class="custom-file-label" for="gameIllustration">Choisir un fichier</label>
                </div>
            </div>

            <div class="form-group">
                <label for="gameReleaseDate">Date de sortie</label>
                <input type="date" class="form-control" id="gameReleaseDate" name="gameReleaseDate" required>
            </div>

            <button type="submit" class="btn btn-success" name="createGameSubmit">Ajouter</button>
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