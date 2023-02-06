<?php $title = "Supprimer l'entreprise " . $company['title'] . " - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/compagnies">Retourner sur la liste des entreprises</a>
        </div>

        <?php if (isset($companyDeleted)) : ?>
            <?php if ($companyDeleted == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Suppression de l'entreprise échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php else: ?>
            <h1 class="h3 mb-2 text-gray-800">Supprimer l'entreprise <strong><?= $company['title']; ?></strong></h1>

            <p class="mb-2"><?= $company['description']; ?></p>

            <p class="mb-2">Date de création : <?= creationDateLittleEndian($company['creation_date']); ?></p>

            <img class="img-fluid rounded mb-2" src="/public/img/compagnies/<?= $company['illustration']; ?>">

            <form class="mb-4" action="" method="post">
                <button type="submit" class="btn btn-danger" name="deleteCompanySubmit">Supprimer</button>
            </form>
        <?php endif ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>