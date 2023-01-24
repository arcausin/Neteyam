<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');

if (countGame($gameIdPublic)) {
    $game = getGame($gameIdPublic);

    $developersGame = getDevelopersByGame($gameIdPublic);
    $publishersGame = getPublishersByGame($gameIdPublic);

    $consolesGame = getConsolesByGame($gameIdPublic);

    $genresGame = getGenresByGame($gameIdPublic);
    $themesGame = getThemesByGame($gameIdPublic);

    $numberExpansionsByGame = countExpansionsByGame($gameIdPublic);
    $numberNewsByGame = countNewsByGame($gameIdPublic);
    $numberReviewsByGame = countReviewsByGame($gameIdPublic);
    $numberGuidesByGame = countGuidesByGame($gameIdPublic);
    $numberFeaturesByGame = countFeaturesByGame($gameIdPublic);
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/read.php');
} else {
    header('Location: /jeux');
    exit();
}