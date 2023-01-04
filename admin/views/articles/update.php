<?php $title = "Modifier l'article " . $article['title'] . " - LeGameVideo.fr"; ?>

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
                    <option selected value="<?= $article['id_category']; ?>"><?= $category['name']; ?></option>
                    <?php foreach ($categories as $categorie) {
                        if ($article['id_category'] != $categorie['id']) {
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
                <input type="text" class="form-control" id="articleTitle" name="articleTitle" maxlength="255" value="<?php if (!empty($article['title'])) : ?><?= $article['title']; ?><?php endif ?>" required>
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
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>