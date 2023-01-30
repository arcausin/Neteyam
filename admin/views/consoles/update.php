<?php $title = "Modifier la console " . $console['name'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/consoles">Retourner sur la liste des consoles</a>
        </div>

        <?php if (isset($consoleUpdated)) : ?>
            <?php if ($consoleUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification de la console échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification de la console <strong><?= $console['name']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="consoleName">Titre de la console</label>
                <input type="text" class="form-control" id="consoleName" name="consoleName" maxlength="255" value="<?php if (!empty($console['name'])) : ?><?= $console['name']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="consoleColor">Couleur</label>
                <select class="custom-select" id="consoleColor" name="consoleColor" required>
                    <option selected value="<?php if (!empty($console['color'])) : ?> <?= $console['color']; ?> <?php else : ?> 0 <?php endif ?>"><?php if (!empty($console['color'])) : ?> <?= $console['color']; ?> <?php else : ?> Sélectionner une couleur <?php endif ?></option>
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
                <textarea class="form-control" id="consoleDescription" name="consoleDescription" rows="5" required><?php if (!empty($console['description'])) : ?><?= $console['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de l'extension</p>
                <img class="img-fluid rounded mb-2" src="/public/img/consoles/<?= $console['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="consoleIllustration" name="consoleIllustration">
                    <label class="custom-file-label" for="consoleIllustration"><?php if (!empty($console['illustration'])) : ?><?= $console['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="consoleReleaseDate">Date de sortie</label>
                <input type="date" class="form-control" id="consoleReleaseDate" name="consoleReleaseDate" value="<?php if (!empty($console['release_date'])) : ?><?= $console['release_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updateConsoleSubmit">Modifier</button>
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