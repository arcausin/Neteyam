<?php $title = $article['title'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-4">
        <div class="mb-2">
            <a href="/administration/articles">Retourner sur la liste des articles</a>
        </div>
        
        <p class="mb-2">Jeux liés :
        <?php if (!empty($games)) {
            foreach ($games as $game) { ?>
                <a href="/administration/jeux/<?= $game['id_public']; ?>"><?= $game['title']; ?></a> /
            <?php }
        }
        else {
            ?>
            aucuns
            <?php
        } ?>
        </p>
        
        <p class="mb-2">Auteur : <a href="/administration/utilisateurs/<?= $author['id_public']; ?>"><?= $author['pseudonym']; ?></a></p>

        <p class="mb-2">Catégorie : 
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
        </p>

        <p class="mb-2">Valider :
        <?php if ($article['validate']) : ?>
            <span style="color:green">oui</span>
        <?php else : ?>
            <span style="color:red">non</span>
        <?php endif ?>
        </p>

        <p class="mb-2">En ligne :
        <?php if ($article['visible']) : ?>
            <span style="color:green">oui</span>
        <?php else : ?>
            <span style="color:red">non</span>
        <?php endif ?>
        </p>

        <p class="mb-2">Dernière mise à jour : 
        <?php if ($article['update_date']) : ?>
            <?= creationDateLittleEndian($article['update_date']); ?>
        <?php else : ?>
            aucune
        <?php endif ?>
        </p>

        <p class="mb-2">Date de création : <?= creationDateLittleEndian($article['creation_date']); ?></p>
    </div>
    <div class="col-12 col-lg-6">
        <h1 class="h3 mb-2 text-gray-800"><strong><?= $article['title']; ?></strong></h1>

        <img class="img-fluid rounded mb-4" src="/public/img/articles/<?= $article['illustration']; ?>">

        <div class="mb-3"><?= PrintContentsArticle($article['subtitle']); ?></div>

        <hr>

        <div class="mb-3"><?= PrintContentsArticle($article['contents']); ?></div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>




