<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription - LeGameVideo.fr</title>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/include/css.php'); ?>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                        <?php if (isset($userCreated)) : ?>
                            <?php if ($userCreated == false && !empty($message)) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Création du compte échoué !<br/>
                                    Erreur</strong> : <?= $message; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Création d'un compte</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="userPseudonym" name="userPseudonym" placeholder="Pseudo">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="userMailAdress" name="userMailAdress" placeholder="Adresse mail">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="adminKey" name="adminKey" placeholder="Clé d'administration">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="userPassword" name="userPassword" placeholder="Mot de passe">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="userPasswordConfirm" name="userPasswordConfirm" placeholder="Confirmation du mot de passe">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="createUserSubmit">Créer un compte</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/administration/mot-de-passe-oublie">Mot de passe oublié ?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/administration/connexion">Vous avez déjà un compte ?</a>
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