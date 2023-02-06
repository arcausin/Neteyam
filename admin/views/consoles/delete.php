<?php $title = "Supprimer la console " . $console['name'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/consoles">Retourner sur la liste des consoles</a>
        </div>

        <?php if (isset($consoleDeleted)) : ?>
            <?php if ($consoleDeleted == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Suppression de la console échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php else: ?>
            <h1 class="h3 mb-2 text-gray-800">Supprimer la console <strong><?= $console['name']; ?></strong></h1>

            <span class="badge badge-<?= $console['color']; ?> py-2 mb-1"><?= $console['name']; ?></span>

            <p class="mb-2"><?= $console['description']; ?></p>

            <p class="mb-2">Date de sortie : <?= creationDateLittleEndian($console['release_date']); ?></p>

            <img class="img-fluid rounded mb-2" src="/public/img/consoles/<?= $console['illustration']; ?>">

            <form class="mb-4" action="" method="post">
                <button type="submit" class="btn btn-danger" name="deleteConsoleSubmit">Supprimer</button>
            </form>
        <?php endif ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>