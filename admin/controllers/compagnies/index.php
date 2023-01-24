<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/compagnies.php');

$compagnies = getCompagnies();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/compagnies/index.php');