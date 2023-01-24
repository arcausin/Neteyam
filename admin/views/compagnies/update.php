<?php $title = "Modifier l'entreprise " . $company['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="mb-2">
            <a href="/administration/entreprises">Retourner sur la liste des entreprises</a>
        </div>

        <?php if (isset($companyUpdated)) : ?>
            <?php if ($companyUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification de l'entreprise échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification de l'entreprise <strong><?= $company['title']; ?></strong></h1>

        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="companyTitle">Titre de l'entreprise</label>
                <input type="text" class="form-control" id="companyTitle" name="companyTitle" maxlength="255" value="<?php if (!empty($company['title'])) : ?><?= $company['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="companyDescription">Description</label>
                <textarea class="form-control" id="companyDescription" name="companyDescription" rows="5" required><?php if (!empty($company['description'])) : ?><?= $company['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration de l'entreprise</p>
                <img class="img-fluid rounded mb-2" src="/public/img/compagnies/<?= $company['illustration']; ?>">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="companyIllustration" name="companyIllustration">
                    <label class="custom-file-label" for="companyIllustration"><?php if (!empty($company['illustration'])) : ?><?= $company['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="companyCreationDate">Date de création</label>
                <input type="date" class="form-control" id="companyCreationDate" name="companyCreationDate" value="<?php if (!empty($company['creation_date'])) : ?><?= $company['creation_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updateCompanySubmit">Modifier</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("companyIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>