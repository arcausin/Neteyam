<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;500;700&family=Roboto+Slab:wght@300;500;700&display=swap" rel="stylesheet">
    
    <title><?= $title; ?></title>
    <style>
        h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto Slab', serif;
        }

        div, span, p, a {
            font-family: 'Rajdhani', sans-serif;
        }

        .text-justify {
            text-align: justify;
        }

        .opacity-mid {
            opacity: 0.5;
            transition: opacity 0.5s;
        }

        .opacity-mid:hover {
            opacity: 1;
        }

        .animate-opacity {
            transition: opacity 0.5s;
        }

        .animate-opacity:hover {
            opacity: 0.5;
        }

        .shadow-top {
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
        }

        .shadow-bottom {
            box-shadow: 0 -.5rem 1rem rgba(0,0,0,.15);
        }

        .shortcut-word {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body class="bg-dark text-white">
    <header class="shadow-top">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-md">
                <a class="navbar-brand fs-4 animate-opacity" href="/">Neteyam.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link text-white animate-opacity">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="/jeux" class="nav-link text-white animate-opacity">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a href="/actualites" class="nav-link text-white animate-opacity">Actualités</a>
                        </li>
                        <li class="nav-item">
                            <a href="/tests" class="nav-link text-white animate-opacity">Tests</a>
                        </li>
                        <li class="nav-item">
                            <a href="/guides" class="nav-link text-white animate-opacity">Guides</a>
                        </li>
                        <li class="nav-item">
                            <a href="/dossiers" class="nav-link text-white animate-opacity">Dossiers</a>
                        </li>
                        <li class="nav-item">
                        <a href="/contact" class="nav-link text-white animate-opacity pe-0">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container" style="min-height: 60vh;">
        <?= $content; ?>
    </main>
    
    <footer class="shadow-bottom">
        <div class="container">
            <div class="text-center py-3">
                <p class="fs-4"><a class="text-decoration-none text-white animate-opacity" href="/">Neteyam.com</a></p>
                <p><a class="text-white animate-opacity" href="/equipes">L'equipe</a> | <a class="text-white animate-opacity" href="/mentions-legales">Mentions Légales</a> | <a class="text-white animate-opacity" href="/politique-de-confidentialite">Politique de confidentialité</a> | <a class="text-white animate-opacity" href="/contact">Contact</a></p>
        
                <hr>

                <p class="mb-3">NOUS SUIVRE</p>
                <span><a href="#"><i class="bi bi-twitter fs-2 ms-2 text-white animate-opacity"></i></a></span>
                <span><a href="#"><i class="bi bi-facebook fs-2 ms-2 text-white animate-opacity"></i></a></span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>