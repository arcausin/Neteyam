<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mot de passe oublié - LeGameVideo.fr</title>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/include/css.php'); ?>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php if (isset($mailSended)) : ?>
                                    <?php if ($mailSended) : ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Un email de réinitialisation de mot de passe vous a été envoyé.</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php elseif ($mailSended == false && !empty($message)) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Erreur</strong> : <?= $message; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Mot de passe oublié</h1>
                                        <p class="mb-4">Nous vous enverrons un mail pour réinitialiser votre mot de passe si vous aviez un compte.</p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="userMailAdress" name="userMailAdress" aria-describedby="emailHelp" placeholder="Adresse mail">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="resetPasswordUserSubmit">Réinitialiser votre mot de passe</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/administration/inscription/">Créer un compte</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/administration/connexion/">Vous avez déjà un compte ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/include/javascript.php'); ?>
</body>
</html>