<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');

$games = getLastGames('0', 4);
$lastNews = getLastNews('0', 4);
$lastReviews = getLastReviews('0', 4);
$lastGuides = getLastGuides('0', 4);
$lastFeatures = getLastFeatures('0', 4);

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/homepage.php');