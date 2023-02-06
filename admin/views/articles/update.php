<?php $title = "Modifier l'article " . $article['title'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/articles">Retourner sur la liste des articles</a>
        </div>

        <?php if (isset($articleUpdated)) : ?>
            <?php if ($articleUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification de l'article échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification de l'article <strong><?= $article['title']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="articleCategory">Catégorie</label>
                <select class="custom-select" id="articleCategory" name="articleCategory" required>
                    <option selected value="<?= $article['id_category']; ?>"><?= $categoryArticle['name']; ?></option>
                    <?php foreach ($categories as $category) {
                        if ($article['id_category'] != $category['id']) {
                            ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="articleAuthor">Auteur</label>
                <select class="custom-select" id="articleAuthor" name="articleAuthor" required>
                    <option selected value="<?= $authorArticle['id']; ?>"><?= $authorArticle['pseudonym']; ?></option>
                    <?php foreach ($authors as $author) {
                        if ($article['id_author'] != $author['id']) {
                            ?>
                            <option value="<?= $author['id']; ?>"><?= $author['pseudonym']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <p class="mb-0">Publication de l'article :</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="articleValidate" name="articleValidate" <?php if ($article['validate'] == 1) { ?>checked<?php } ?>>
                    <label class="form-check-label" for="articleValidate">Valider</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="articleVisible" name="articleVisible" <?php if ($article['visible'] == 1) { ?>checked<?php } ?>>
                    <label class="form-check-label" for="articleVisible">Visible</label>
                </div>
            </div>

            <div class="form-group">
                <label for="articleTitle">Titre de l'article</label>
                <input type="text" class="form-control" id="articleTitle" name="articleTitle" maxlength="255" value="<?php if (!empty($article['title'])) : ?><?= $article['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="articleSlug">Slug de l'article</label>
                <input type="text" class="form-control" id="articleSlug" name="articleSlug" maxlength="255" value="<?php if (!empty($article['id_public'])) : ?><?= $article['id_public']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de l'article</p>
                <img class="img-fluid rounded mb-2" src="/public/img/articles/<?= $article['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="articleIllustration" name="articleIllustration">
                    <label class="custom-file-label" for="articleIllustration"><?php if (!empty($article['illustration'])) : ?><?= $article['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="articleSubtitle">Sous-titre</label>
                <textarea class="form-control" id="articleSubtitle" name="articleSubtitle" rows="2"><?php if (!empty($article['subtitle'])) : ?><?= PrintContentsArticle($article['subtitle']); ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <label for="articleContents">Contenu</label>
                <textarea class="form-control" id="articleContents" name="articleContents" rows="5"><?php if (!empty($article['contents'])) : ?><?= PrintContentsArticle($article['contents']); ?><?php endif ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning" name="updateArticleSubmit">Modifier</button>
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