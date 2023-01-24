<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countNewsByGame($gameIdPublic) != 0) {
    $game = getGame($gameIdPublic);
    $news = getNewsByGame($gameIdPublic);

    $numberExpansionsByGame = countExpansionsByGame($gameIdPublic);
    $numberNewsByGame = countNewsByGame($gameIdPublic);
    $numberReviewsByGame = countReviewsByGame($gameIdPublic);
    $numberGuidesByGame = countGuidesByGame($gameIdPublic);
    $numberFeaturesByGame = countFeaturesByGame($gameIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/news.php');
} else {
    header('Location: /jeux/' . $gameIdPublic);
    exit();
}