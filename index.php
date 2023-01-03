<?php

$url[0] = '';

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

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
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/games/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/games/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && !empty($url[2]) && empty($url[3])) {
        $gameIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/games/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $gameIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/games/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'jeux' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $gameIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/games/delete.php');
    }
    
    elseif ($url[0] == 'administration' && $url[1] == 'developpeurs' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/developers/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'developpeurs' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/developers/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'developpeurs' && !empty($url[2]) && empty($url[3])) {
        $developerIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/developers/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'developpeurs' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $developerIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/developers/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'developpeurs' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $developerIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/developers/delete.php');
    }
    
    elseif ($url[0] == 'administration' && $url[1] == 'editeurs' && empty($url[2])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/publishers/index.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'editeurs' && $url[2] == 'ajouter' && empty($url[3])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/publishers/create.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'editeurs' && !empty($url[2]) && empty($url[3])) {
        $publisherIdPublic = $url[2];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/publishers/read.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'editeurs' && $url[2] == 'modifier' && !empty($url[3]) && empty($url[4])) {
        $publisherIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/publishers/update.php');
    }
    elseif ($url[0] == 'administration' && $url[1] == 'editeurs' && $url[2] == 'supprimer' && !empty($url[3]) && empty($url[4])) {
        $publisherIdPublic = $url[3];
        require_once($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/pages/entities/publishers/delete.php');
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
    elseif ($url[0] == 'jeux' && !empty($url[1]) && empty($url[2])) {
        $gameIdPublic = $url[1];
        require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/games/read.php');
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