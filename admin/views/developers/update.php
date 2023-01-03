<?php $title = "Modifier le développeur " . $developer['title'] . " - LeGameVideo.fr"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/developpeurs">Retourner sur la liste des développeurs</a>
        </div>

        <?php if (isset($developerUpdated)) : ?>
            <?php if ($developerUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification du développeur échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification du développeur <strong><?= $developer['title']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="developerTitle">Titre du développeur</label>
                <input type="text" class="form-control" id="developerTitle" name="developerTitle" maxlength="255" value="<?php if (!empty($developer['title'])) : ?><?= $developer['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="developerDescription">Description</label>
                <textarea class="form-control" id="developerDescription" name="developerDescription" rows="5" required><?php if (!empty($developer['description'])) : ?><?= $developer['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration du développeur</p>
                <img class="img-fluid rounded mb-2" src="/public/img/developers/<?= $developer['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="developerIllustration" name="developerIllustration">
                    <label class="custom-file-label" for="developerIllustration"><?php if (!empty($developer['illustration'])) : ?><?= $developer['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="developerCreationDate">Date de création</label>
                <input type="date" class="form-control" id="developerCreationDate" name="developerCreationDate" value="<?php if (!empty($developer['creation_date'])) : ?><?= $developer['creation_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updateDeveloperSubmit">Modifier</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("developerIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>