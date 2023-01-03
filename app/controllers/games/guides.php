<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countGuidesByGame($gameIdPublic) != 0) {
    $game = getGame($gameIdPublic);
    $guides = getGuidesByGame($gameIdPublic);

    $numberNewsByGame = countNewsByGame($gameIdPublic);
    $numberReviewsByGame = countReviewsByGame($gameIdPublic);
    $numberGuidesByGame = countGuidesByGame($gameIdPublic);
    $numberFeaturesByGame = countFeaturesByGame($gameIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/guides.php');
} else {
    header('Location: /jeux/' . $gameIdPublic);
    exit();
}