<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');

$lastNews = getLastNews('0', 4);
$lastReviews = getLastReviews('0', 4);
$lastGuides = getLastGuides('0', 4);
$lastFeatures = getLastFeatures('0', 4);
$lastGames = getLastGames(3);
$nextGames = getNextGames(3);

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/homepage.php');