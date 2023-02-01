<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/genres.php');

if (countGamesByGenre($genreIdPublic) != 0) {
    $genre = getGenre($genreIdPublic);

    $gamesGenre = getGamesByGenre($genreIdPublic);

    $numberGamesByGenre = countGamesByGenre($genreIdPublic);

    require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/genres/games.php');
} else {
    header('Location: /genres');
    exit();
}