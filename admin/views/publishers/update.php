<?php $title = "Modifier l'éditeur " . $publisher['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/editeurs">Retourner sur la liste des éditeurs</a>
        </div>

        <?php if (isset($publisherUpdated)) : ?>
            <?php if ($publisherUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification de l'éditeur échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification de l'éditeur <strong><?= $publisher['title']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="publisherTitle">Titre de l'éditeur</label>
                <input type="text" class="form-control" id="publisherTitle" name="publisherTitle" maxlength="255" value="<?php if (!empty($publisher['title'])) : ?><?= $publisher['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="publisherDescription">Description</label>
                <textarea class="form-control" id="publisherDescription" name="publisherDescription" rows="5" required><?php if (!empty($publisher['description'])) : ?><?= $publisher['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de l'éditeur</p>
                <img class="img-fluid rounded mb-2" src="/public/img/publishers/<?= $publisher['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="publisherIllustration" name="publisherIllustration">
                    <label class="custom-file-label" for="publisherIllustration"><?php if (!empty($publisher['illustration'])) : ?><?= $publisher['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="publisherCreationDate">Date de création</label>
                <input type="date" class="form-control" id="publisherCreationDate" name="publisherCreationDate" value="<?php if (!empty($publisher['creation_date'])) : ?><?= $publisher['creation_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updatePublisherSubmit">Modifier</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("publisherIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>