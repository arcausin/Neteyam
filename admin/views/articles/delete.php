<?php $title = "Supprimer l'article " . $article['title'] . " - LeGameVideo.fr"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/articles">Retourner sur la liste des articles</a>
        </div>

        <?php if (isset($articleDeleted)) : ?>
            <?php if ($articleDeleted == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Suppression de l'article échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php else: ?>
            <h1 class="h3 mb-2 text-gray-800">Supprimer l'article <strong><?= $article['title']; ?></strong></h1>

            <img class="img-fluid rounded mb-2" src="/public/img/articles/<?= $article['illustration']; ?>">

            <p class="mb-2"><?= PrintContentsArticle($article['subtitle']); ?></p>

            <hr>

            <p class="mb-2"><?= PrintContentsArticle($article['contents']); ?></p>

            <form class="mb-4" action="" method="post">
                <button type="submit" class="btn btn-danger" name="deleteArticleSubmit">Supprimer</button>
            </form>
        <?php endif ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>