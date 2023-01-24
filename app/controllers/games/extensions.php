<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countExpansionsByGame($gameIdPublic) != 0) {
    $game = getGame($gameIdPublic);
    $expansions = GetExpansionsByGame($gameIdPublic);

    $numberExpansionsByGame = countExpansionsByGame($gameIdPublic);
    $numberNewsByGame = countNewsByGame($gameIdPublic);
    $numberReviewsByGame = countReviewsByGame($gameIdPublic);
    $numberGuidesByGame = countGuidesByGame($gameIdPublic);
    $numberFeaturesByGame = countFeaturesByGame($gameIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/extensions.php');
} else {
    header('Location: /jeux/' . $gameIdPublic);
    exit();
}