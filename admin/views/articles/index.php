<?php $title = "Articles - LeGameVideo.fr"; ?>

<?php ob_start(); ?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Articles</h1>
    <a class="d-none d-inline-block btn btn-success" href="/administration/articles/ajouter">Ajouter un article</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des articles référencés sur LeGameVideo.fr</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 1, "asc" ]]'>
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
                        <th>Valider</th>
                        <th>Visible</th>
                        <th>Dernière mise à jour</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Actions</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
                        <th>Valider</th>
                        <th>Visible</th>
                        <th>Dernière mise à jour</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                foreach ($articles as $article) {
                $games = getGamesByArticle($article['id_public']);
                $author = getAuthorByArticle($article['id_public']);
                ?>
                    <tr>
                        <td><a class="text-warning" href="/administration/articles/modifier/<?= $article['id_public']; ?>"><i class="fas fa-pencil-alt"></i></a> | <a class="text-danger" href="/administration/articles/supprimer/<?= $article['id_public']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                        <td><a href="/administration/articles/<?= $article['id_public']; ?>"><?= $article['title']; ?></a></td>
                        <td><a href="/administration/utilisateurs/<?= $author['id_public']; ?>"><?= $author['pseudonym']; ?></a></td>

                        <?php if ($article['id_category'] == '1') : ?>
                            <td>Actualités</td>
                        <?php elseif ($article['id_category'] == '2') : ?>
                            <td>Tests</td>
                        <?php elseif ($article['id_category'] == '3') : ?>
                            <td>Guides</td>
                        <?php elseif ($article['id_category'] == '4') : ?>
                            <td>Dossiers</td>
                        <?php else : ?>
                            <td>Inconnu</td>
                        <?php endif ?>

                        <?php if ($article['validate']) : ?>
                            <td bgcolor="green"></td>
                        <?php else : ?>
                            <td bgcolor="red"></td>
                        <?php endif ?>
                        
                        <?php if ($article['visible']) : ?>
                            <td bgcolor="green"></td>
                        <?php else : ?>
                            <td bgcolor="red"></td>
                        <?php endif ?>
                        
                        <td>
                            <?php if ($article['update_date']) : ?>
                                <?= $article['update_date']; ?>
                            <?php else : ?>
                                <?= $article['creation_date']; ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>