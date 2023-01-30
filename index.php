<?php
session_start();

$url[0] = '';

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}

$host = $_SERVER['HTTP_HOST'];

if (strpos($host, 'www') === 0) {
    $host = substr($host, 4);
}

$urlNative = "https://" . $host;

if ($url[0] == 'administration') {
    if ($url[0] == 'administration' && empty($url[1])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/homepage.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'inscription' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/register.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'connexion' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/login.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'deconnexion' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/logout.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'mot-de-passe-oublie' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/forgot-password.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'nouveau-mot-de-passe' && !empty($url[2]) && empty($url[3])) {
        $userResetToken = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/new-password.php');
    }

    elseif ($url[0] == 'administration' && $url[1] == 'articles' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'articles' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'articles' && !empty($url[2]) && empty($url[3])) {
        $articleIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'articles' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $articleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'articles' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $articleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/articles/delete.php');
    }
    
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && !empty($url[2]) && empty($url[3])) {
        $gameIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $gameIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $gameIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/games/delete.php');
    }

    elseif ($url[0] == 'administration' && $url[1] == 'extensions' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'extensions' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'extensions' && !empty($url[2]) && empty($url[3])) {
        $expansionIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'extensions' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $expansionIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'extensions' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $expansionIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/expansions/delete.php');
    }

    elseif ($url[0] == 'administration' && $url[1] == 'consoles' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'consoles' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'consoles' && !empty($url[2]) && empty($url[3])) {
        $consoleIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'consoles' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $consoleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'consoles' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $consoleIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/consoles/delete.php');
    }
    
    elseif ($url[0] == 'administration' && $url[1] == 'entreprises' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'entreprises' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'entreprises' && !empty($url[2]) && empty($url[3])) {
        $companyIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'entreprises' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $companyIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'entreprises' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $companyIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/compagnies/delete.php');
    }
    
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'components' && $url[3] == 'buttons') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/components/buttons.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'components' && $url[3] == 'cards') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/components/cards.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'animations') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/animations.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'borders') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/borders.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'colors') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/colors.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'utilities' && $url[3] == 'others') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/utilities/others.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'libraries' && $url[3] == 'chart') {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/documentation/libraries/chart.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'documentation' && $url[2] == 'libraries' && $url[3] == 'datatables') {
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

    elseif ($url[0] == 'genres' && !empty($url[1]) && $url[2] == 'jeux' && empty($url[3])) {
        $genreIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/genres/games.php');
    }

    elseif ($url[0] == 'themes' && !empty($url[1]) && $url[2] == 'jeux' && empty($url[3])) {
        $genreIdPublic = $url[1];
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