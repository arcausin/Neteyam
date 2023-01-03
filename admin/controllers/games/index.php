<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/games.php');

$games = getGames();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/games/index.php');