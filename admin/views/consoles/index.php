<?php $title = "Consoles - " . ucfirst($host); ?>

<?php ob_start(); ?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Consoles</h1>
    <a class="d-none d-inline-block btn btn-success" href="/administration/consoles/ajouter">Ajouter une consoles</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des consoles référencées sur <?= ucfirst($host); ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 3, "asc" ]]'>
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Nom</th>
                        <th>Couleur</th>
                        <th>Date de sortie</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Actions</th>
                        <th>Nom</th>
                        <th>Couleur</th>
                        <th>Date de sortie</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                foreach ($consoles as $console) {
                ?>
                    <tr>
                        <td><a class="text-warning" href="/administration/consoles/modifier/<?= $console['id_public']; ?>"><i class="fas fa-pencil-alt"></i></a> | <a class="text-danger" href="/administration/consoles/supprimer/<?= $console['id_public']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                        <td><a href="/administration/consoles/<?= $console['id_public']; ?>"><?= $console['name']; ?></a></td>
                        <td><?= $console['color']; ?></td>
                        <td><?= $console['release_date']; ?></td>
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