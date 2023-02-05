<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Search Engine -->
    <meta name="description" content="<?= $description; ?>">
    <meta name="image" content="<?= $image; ?>">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="<?= $title; ?>">
    <meta itemprop="description" content="<?= $description; ?>">
    <meta itemprop="image" content="<?= $image; ?>">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= $title; ?>">
    <meta name="twitter:description" content="<?= $description; ?>">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="<?= $title; ?>">
    <meta name="og:description" content="<?= $description; ?>">
    <?php if (isset($article)) { ?> <meta name="og:image" content="<?= $article['illustration']; ?>"> <?php ; } ?>
    <meta name="og:url" content="<?= $urlNative; ?>">
    <meta name="og:site_name" content="Neteyam">
    <meta name="og:locale" content="fr_FR">
    <meta name="og:type" content="<?php if (isset($article)) { echo "article"; } else { echo "website"; } ?>">

    <?php if (isset($article)) { ?>
        <!-- Open Graph - Article -->
        <meta name="article:section" content="<?= $categoryArticle['name']; ?>">
        <meta name="article:published_time" content="<?= $article['creation_date']; ?>">
        <meta name="article:author" content="<?= $author['pseudonym']; ?>">

        <?php if (isset($article['update_date']) && $article['update_date'] != null) { ?>
            <meta name="article:modified_time" content="<?= $article['update_date']; ?>">
        <?php ; } ?>
    <?php ; } ?>

    <link rel="icon" type="image/png" href="/public/img/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .roboto-slab {
            font-family: 'Roboto Slab', serif;
        }

        div, span, p, a {
            font-family: 'Rajdhani', sans-serif;
        }

        .rajdhani {
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let windowHeight = window.innerHeight;

            let headerHeight = document.querySelector("#header-content").offsetHeight;

            let footerHeight = document.querySelector("#footer-content").offsetHeight;

            let bodyHeight = windowHeight - footerHeight;

            // Ajouter la hauteur de la barre de navigation au "padding-top" du conteneur de contenu
            document.querySelector("#main-content").style.paddingTop = headerHeight + "px";
            document.querySelector("#main-content").style.minHeight = bodyHeight + "px";
        });
    </script>
</head>
<body class="bg-dark text-white">
    <header class="shadow-top bg-dark fixed-top" id="header-content">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-md">
                <a class="navbar-brand fs-4 animate-opacity" href="/">Neteyam.com</a>
                <?php if (!empty($_SESSION['user'])) { ?>
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/administration">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-tachometer-alt text-white"></i>
                        </div>
                    </a>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link text-white animate-opacity ps-0">Accueil</a>
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

    <main class="container" style="min-height: 60vh; padding-top: 62px" id="main-content">
        <?= $content; ?>
    </main>
    
    <footer class="shadow-bottom" id="footer-content">
        <div class="container">
            <div class="text-center py-3">
                <p class="mb-3">NOUS SUIVRE</p>
                <span><a href="#"><i class="bi bi-twitter fs-2 ms-2 text-white animate-opacity"></i></a></span>
                <span><a href="#"><i class="bi bi-facebook fs-2 ms-2 text-white animate-opacity"></i></a></span>
        
                <hr>

                <p><a class="text-white animate-opacity" href="#">L'equipe</a> | <a class="text-white animate-opacity" href="#">Mentions Légales</a> | <a class="text-white animate-opacity" href="#">Politique de confidentialité</a> | <a class="text-white animate-opacity" href="/contact">Contact</a></p>
                <p class="fs-4"><a class="text-decoration-none text-white animate-opacity" href="/">Neteyam.com</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>