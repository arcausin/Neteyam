<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/developers.php');

$developers = getDevelopers();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/pages/entities/developers/index.php');