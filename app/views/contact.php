<?php $title = "Contact - Neteyam.com"; ?>

<?php $description = "Formulaire de contact du site Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Contact</p>

    <?php if (isset($mailSended)) : ?>
        <?php if ($mailSended == false && !empty($message)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Envoie du mail échoué !<br/>
                Erreur</strong> : <?= $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php else : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Envoie du mail réussie !</strong>
                Vous recevrez par mail une confirmation de réception.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
    <?php endif ?>

    <h1 class="mb-3">Contact</h1>

    <div class="row">
        <div class="col-12 col-lg-6">
            <form class="p-3 mb-3 shadow rounded" action="" method="post">
                <div class="form-group mb-3">
                    <label for="mailAdressContact">Adresse mail</label>
                    <input type="email" class="form-control shadow" id="mailAdressContact" name="mailAdressContact" maxlength="255" placeholder="Adresse mail" value="<?php if (!empty($mailAdressContact)) : ?><?= $mailAdressContact; ?><?php endif ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="subjectContact">Sujet</label>
                    <input type="text" class="form-control shadow" id="subjectContact" name="subjectContact" maxlength="255" placeholder="Sujet" value="<?php if (!empty($subjectContact)) : ?><?= $subjectContact; ?><?php endif ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="messageContact">Message</label>
                    <textarea class="form-control shadow" id="messageContact" name="messageContact" rows="5" placeholder="Message" required><?php if (!empty($messageContact)) : ?><?= $messageContact; ?><?php endif ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-1" for="questionContact">Qui a formulé les trois lois de la robotique ?</label>
                    <select class="custom-select shadow" id="questionContact" name="questionContact" required>
                        <option selected value="0">Sélectionner une réponse</option>
                        <option value="1">James Cameron</option>
                        <option value="2">Isaac Asimov</option>
                        <option value="3">Hideo Kojima</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-light shadow" name="contactSubmit">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>