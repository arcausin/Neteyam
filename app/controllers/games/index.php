<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');

$games = getGames();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/index.php');