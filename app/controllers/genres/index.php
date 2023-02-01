<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/genres.php');

$genres = getGenres();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/genres/index.php');