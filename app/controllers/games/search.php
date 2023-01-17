<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/games.php');

if (!empty($search)) {
    $gamesSearch = getGamesBySearch($search);
    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/games/search.php');
} 