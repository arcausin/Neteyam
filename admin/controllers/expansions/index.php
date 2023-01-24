<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/expansions.php');

$expansions = getExpansions();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/expansions/index.php');