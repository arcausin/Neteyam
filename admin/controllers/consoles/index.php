<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/consoles.php');

$consoles = getConsoles();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/consoles/index.php');