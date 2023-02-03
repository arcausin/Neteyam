<?php $title = "Ajouter un article - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/articles">Retourner sur la liste des articles</a>
        </div>

        <?php if (isset($articleCreated)) : ?>
            <?php if ($articleCreated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ajout de l'article échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Ajouter un article</h1>

        <p class="mb-2">Formulaire d'ajout d'un article sur Neteyam.com</p>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="articleCategory">Catégorie</label>
                <select class="custom-select" id="articleCategory" name="articleCategory" required>
                    <option selected value="<?php if (!empty($articleCategory['id'])) : ?> <?= $articleCategory['id']; ?> <?php else : ?> 0 <?php endif ?>"><?php if (!empty($articleCategory['name'])) : ?> <?= $articleCategory['name']; ?> <?php else : ?> Sélectionner une catégorie <?php endif ?></option>
                    <?php foreach ($categories as $categorie) {
                        if ($articleCategory['id'] != $categorie['id']) {
                            ?>
                            <option value="<?= $categorie['id']; ?>"><?= $categorie['name']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="articleTitle">Titre de l'article</label>
                <input type="text" class="form-control" id="articleTitle" name="articleTitle" maxlength="255" value="<?php if (!empty($articleTitle)) : ?><?= $articleTitle; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="articleSlug">Slug</label>
                <input type="text" class="form-control" id="articleSlug" name="articleSlug" maxlength="255" value="<?php if (!empty($articleSlug)) : ?><?= $articleSlug; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de l'article</p>
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="articleIllustration" name="articleIllustration">
                    <label class="custom-file-label" for="articleIllustration">Choisir un fichier</label>
                </div>
            </div>

            <div class="form-group">
                <label for="articleSubtitle">Sous-titre</label>
                <textarea class="form-control" id="articleSubtitle" name="articleSubtitle" rows="2"><?php if (!empty($articleSubtitle)) : ?><?= $articleSubtitle; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <label for="articleContents">Contenu</label>
                <textarea class="form-control" id="articleContents" name="articleContents" rows="5"><?php if (!empty($articleContents)) : ?><?= $articleContents; ?><?php endif ?></textarea>
            </div>

            <button type="submit" class="btn btn-success" name="createArticleSubmit">Ajouter</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("articleIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>

<script>
    tinymce.init({
    selector: '#articleSubtitle',
    language: 'fr_FR',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    tinymce.init({
    selector: '#articleContents',
    language: 'fr_FR',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
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

  const titleInput = document.querySelector('#articleTitle');
  const slugInput = document.querySelector('#articleSlug');

  titleInput.addEventListener('input', function() {
    slugInput.value = slugifyJS(titleInput.value);
  });
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>