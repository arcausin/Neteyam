<?php
session_start();

$url[0] = '';

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

$host = $_SERVER['HTTP_HOST'];

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $location = 'https://' . $host . $_SERVER['REQUEST_URI'];
    header('Location: ' . $location);
    exit;
}

if (substr($host, 0, 4) === 'www.') {
    $no_www_host = substr($host, 4);
    $location = 'https://' . $no_www_host . $_SERVER['REQUEST_URI'];
    header('Location: ' . $location);
    exit;
}

$urlNative = "https://" . $host;

if ($url[0] == 'administration') {
    if (!empty($_SESSION['user']) && $url[0] == 'administration' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/homepage.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'inscription' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/register.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'connexion' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/login.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'deconnexion' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/logout.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'mot-de-passe-oublie' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/forgot-password.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'nouveau-mot-de-passe' && !empty($url[2]) && empty($url[3])) {
        $userResetToken = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/new-password.php');
    }

    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'articles' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/index.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'articles' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/create.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'articles' && !empty($url[2]) && empty($url[3])) {
        $articleIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/read.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'articles' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $articleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/update.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'articles' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $articleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/delete.php');
    }
    
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'jeux' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/index.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/create.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'jeux' && !empty($url[2]) && empty($url[3])) {
        $gameIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/read.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $gameIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/update.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $gameIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/delete.php');
    }

    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'extensions' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/index.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'extensions' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/create.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'extensions' && !empty($url[2]) && empty($url[3])) {
        $expansionIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/read.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'extensions' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $expansionIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/update.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'extensions' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $expansionIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/delete.php');
    }

    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'consoles' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/index.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'consoles' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/create.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'consoles' && !empty($url[2]) && empty($url[3])) {
        $consoleIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/read.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'consoles' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $consoleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/update.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'consoles' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $consoleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/delete.php');
    }
    
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'entreprises' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/index.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'entreprises' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/create.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'entreprises' && !empty($url[2]) && empty($url[3])) {
        $companyIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/read.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'entreprises' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $companyIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/update.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'entreprises' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $companyIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/delete.php');
    }
    
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'components' && $url[3] == 'buttons') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/components/buttons.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'components' && $url[3] == 'cards') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/components/cards.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'animations') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/animations.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'borders') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/borders.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'colors') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/colors.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'others') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/others.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'libraries' && $url[3] == 'chart') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/libraries/chart.php');
    }
    elseif (!empty($_SESSION['user']) && $url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'libraries' && $url[3] == 'datatables') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/libraries/datatables.php');
    }

    else {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/404.php');
    }
}

elseif (!empty($url[0])) {
    if ($url[0] == 'jeux' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/index.php');
    }
    elseif ($url[0] == 'jeux' && $url[1] == 'rechercher' && !empty($url[2]) && empty($url[3])) {
        $search = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/search.php');
    }
    elseif ($url[0] == 'jeux' && !empty($url[1]) && empty($url[2])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/read.php');
    }
    elseif ($url[0] == 'jeux' && !empty($url[1]) && $url[2] == 'extensions' && empty($url[3])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/expansions.php');
    }
    elseif ($url[0] == 'jeux' && !empty($url[1]) && $url[2] == 'actualites' && empty($url[3])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/news.php');
    }
    elseif ($url[0] == 'jeux' && !empty($url[1]) && $url[2] == 'tests' && empty($url[3])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/reviews.php');
    }
    elseif ($url[0] == 'jeux' && !empty($url[1]) && $url[2] == 'guides' && empty($url[3])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/guides.php');
    }
    elseif ($url[0] == 'jeux' && !empty($url[1]) && $url[2] == 'dossiers' && empty($url[3])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/features.php');
    }

    elseif ($url[0] == 'entreprises' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/compagnies/index.php');
    }
    elseif ($url[0] == 'entreprises' && $url[1] == 'rechercher' && !empty($url[2]) && empty($url[3])) {
        $search = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/compagnies/search.php');
    }
    elseif ($url[0] == 'entreprises' && !empty($url[1]) && empty($url[2])) {
        $companyIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/compagnies/read.php');
    }
    elseif ($url[0] == 'entreprises' && !empty($url[1]) && $url[2] == 'developpement' && empty($url[3])) {
        $companyIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/compagnies/development.php');
    }
    elseif ($url[0] == 'entreprises' && !empty($url[1]) && $url[2] == 'edition' && empty($url[3])) {
        $companyIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/compagnies/publishing.php');
    }
    
    elseif ($url[0] == 'consoles' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/consoles/index.php');
    }
    elseif ($url[0] == 'consoles' && !empty($url[1]) && empty($url[2])) {
        $consoleIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/consoles/read.php');
    }
    elseif ($url[0] == 'consoles' && !empty($url[1]) && $url[2] == 'jeux' && empty($url[3])) {
        $consoleIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/consoles/games.php');
    }

    elseif ($url[0] == 'genres' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/genres/index.php');
    }
    elseif ($url[0] == 'genres' && !empty($url[1]) && $url[2] == 'jeux' && empty($url[3])) {
        $genreIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/genres/games.php');
    }

    elseif ($url[0] == 'themes' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/themes/index.php');
    }
    elseif ($url[0] == 'themes' && !empty($url[1]) && $url[2] == 'jeux' && empty($url[3])) {
        $themeIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/themes/games.php');
    }
    
    elseif ($url[0] == 'actualites' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/news/index.php');
    }
    elseif ($url[0] == 'actualites' && !empty($url[1]) && empty($url[2])) {
        $articleIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/articles/read.php');
    }

    elseif ($url[0] == 'tests' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/reviews/index.php');
    }
    elseif ($url[0] == 'tests' && !empty($url[1]) && empty($url[2])) {
        $articleIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/articles/read.php');
    }

    elseif ($url[0] == 'guides' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/guides/index.php');
    }
    elseif ($url[0] == 'guides' && !empty($url[1]) && empty($url[2])) {
        $articleIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/articles/read.php');
    }

    elseif ($url[0] == 'dossiers' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/features/index.php');
    }
    elseif ($url[0] == 'dossiers' && !empty($url[1]) && empty($url[2])) {
        $articleIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/articles/read.php');
    }

    elseif ($url[0] == 'contact' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/contact.php');
    }
    elseif ($url[0] == 'mentions-legales' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/legal-notice.php');
    }
    elseif ($url[0] == 'politique-de-confidentialite' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/privacy-policy.php');
    }
    
    else {
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/404.php');
    }
}

elseif ($url[0] == '' && empty($url[1])) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/homepage.php');
}

else {
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/404.php');
}