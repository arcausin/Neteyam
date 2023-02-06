<?php $title = "Modifier l'extension " . $expansion['title'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/extensions">Retourner sur la liste des extensions</a>
        </div>

        <?php if (isset($expansionUpdated)) : ?>
            <?php if ($expansionUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification de l'extension échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification de l'extension <strong><?= $expansion['title']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="expansionTitle">Titre de l'extension</label>
                <input type="text" class="form-control" id="expansionTitle" name="expansionTitle" maxlength="255" value="<?php if (!empty($expansion['title'])) : ?><?= $expansion['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="expansionSlug">Slug</label>
                <input type="text" class="form-control" id="expansionSlug" name="expansionSlug" maxlength="255" value="<?php if (!empty($expansion['id_public'])) : ?><?= $expansion['id_public']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="expansionDescription">Description</label>
                <textarea class="form-control" id="expansionDescription" name="expansionDescription" rows="5" required><?php if (!empty($expansion['description'])) : ?><?= $expansion['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de l'extension</p>
                <img class="img-fluid rounded mb-2" src="/public/img/expansions/<?= $expansion['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="expansionIllustration" name="expansionIllustration">
                    <label class="custom-file-label" for="expansionIllustration"><?php if (!empty($expansion['illustration'])) : ?><?= $expansion['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="expansionReleaseDate">Date de sortie</label>
                <input type="date" class="form-control" id="expansionReleaseDate" name="expansionReleaseDate" value="<?php if (!empty($expansion['release_date'])) : ?><?= $expansion['release_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updateExpansionSubmit">Modifier</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("expansionIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>

<script>
    function slugifyJS(text, divider = '-') {
        // replace non letter or digits by divider
        text = text.replace(/[^\w\d]+/g, divider);

        // remove unwanted characters
        text = text.replace(/[^-\w]+/g, '');

        // trim
        text = text.trim(divider);

        // remove duplicate divider
        text = text.replace(/--+/g, divider);

        // lowercase
        text = text.toLowerCase();

        if (!text) {
            return makeIdPublicJS();
        }

        return text;
    }

    function makeIdPublicJS() {
        const crypto = window.crypto || window.msCrypto;
        const array = new Uint8Array(16);
        crypto.getRandomValues(array);
        const idPublic = Array.from(array, dec => ('0' + dec.toString(16)).slice(-2)).join('');

        return idPublic;
    }

  const titleInput = document.querySelector('#expansionTitle');
  const slugInput = document.querySelector('#expansionSlug');

  titleInput.addEventListener('input', function() {
    slugInput.value = slugifyJS(titleInput.value);
  });
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>