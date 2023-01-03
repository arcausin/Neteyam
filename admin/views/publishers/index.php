<?php $title = "Éditeurs - LeGameVideo.fr"; ?>

<?php ob_start(); ?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Éditeurs</h1>
    <a class="d-none d-inline-block btn btn-success" href="/administration/editeurs/ajouter">Ajouter un éditeur</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des éditeurs référencés sur LeGameVideo.fr</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 1, "asc" ]]'>
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Actions</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de création</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                foreach ($publishers as $publisher) {
                ?>
                    <tr>
                        <td><a class="text-warning" href="/administration/editeurs/modifier/<?= $publisher['id_public']; ?>"><i class="fas fa-pencil-alt"></i></a> | <a class="text-danger" href="/administration/editeurs/supprimer/<?= $publisher['id_public']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                        <td><a href="/administration/editeurs/<?= $publisher['id_public']; ?>"><?= $publisher['title']; ?></a></td>
                        <td><?= $publisher['description']; ?></td>
                        <td><?= $publisher['creation_date']; ?></td>
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