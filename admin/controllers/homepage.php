<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/articles.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/users.php');

$articlesCount = countArticles();
$gamesCount = countGames();
$compagniesCount = countCompagnies();
$usersCount = countUsers();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/homepage.php');