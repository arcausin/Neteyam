<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/compagnies.php');

$compagnies = getCompagnies();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/compagnies/index.php');