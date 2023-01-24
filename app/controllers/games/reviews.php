<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countReviewsByGame($gameIdPublic) != 0) {
    $game = getGame($gameIdPublic);
    $reviews = getReviewsByGame($gameIdPublic);

    $numberExpansionsByGame = countExpansionsByGame($gameIdPublic);
    $numberNewsByGame = countNewsByGame($gameIdPublic);
    $numberReviewsByGame = countReviewsByGame($gameIdPublic);
    $numberGuidesByGame = countGuidesByGame($gameIdPublic);
    $numberFeaturesByGame = countFeaturesByGame($gameIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/reviews.php');
} else {
    header('Location: /jeux/' . $gameIdPublic);
    exit();
}