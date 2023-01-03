<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion - LeGameVideo.fr</title>

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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php if (isset($userConnected)) : ?>
                                    <?php if ($userConnected == false && !empty($message)) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Connexion échoué !<br/>
                                            Erreur</strong> : <?= $message; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="userMailAdress" name="userMailAdress" placeholder="Adresse mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="userPassword" name="userPassword" placeholder="Mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="connectUserSubmit">Se connecter</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/administration/mot-de-passe-oublie">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/administration/inscription">Créer un compte</a>
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