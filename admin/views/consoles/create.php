<?php $title = "Ajouter une consoles - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/consoles">Retourner sur la liste des consoles</a>
        </div>

        <?php if (isset($consoleCreated)) : ?>
            <?php if ($consoleCreated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ajout de la console échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Ajouter une console</h1>

        <p class="mb-2">Formulaire d'ajout d'une console sur Neteyam.com</p>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="consoleName">Nom de la console</label>
                <input type="text" class="form-control" id="consoleName" name="consoleName" maxlength="255" value="<?php if (!empty($consoleName)) : ?><?= $consoleName; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="consoleColor">Couleur</label>
                <select class="custom-select" id="consoleColor" name="consoleColor" required>
                    <option selected value="<?php if (!empty($consoleColor)) : ?> <?= $consoleColor; ?> <?php else : ?> 0 <?php endif ?>"><?php if (!empty($consoleColor)) : ?> <?= $consoleColor; ?> <?php else : ?> Sélectionner une couleur <?php endif ?></option>
                    <option value="primary">primary</option>
                    <option value="secondary">secondary</option>
                    <option value="success">success</option>
                    <option value="danger">danger</option>
                    <option value="warning">warning</option>
                    <option value="info">info</option>
                    <option value="light">light</option>
                </select>
            </div>

            <div class="form-group">
                <label for="consoleDescription">Description</label>
                <textarea class="form-control" id="consoleDescription" name="consoleDescription" rows="5" required><?php if (!empty($consoleDescription)) : ?><?= $consoleDescription; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de la console</p>
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="consoleIllustration" name="consoleIllustration">
                    <label class="custom-file-label" for="consoleIllustration">Choisir un fichier</label>
                </div>
            </div>

            <div class="form-group">
                <label for="consoleReleaseDate">Date de sortie</label>
                <input type="date" class="form-control" id="consoleReleaseDate" name="consoleReleaseDate" value="<?php if (!empty($consoleReleaseDate)) : ?><?= $consoleReleaseDate; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-success" name="createConsoleSubmit">Ajouter</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("consoleIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>