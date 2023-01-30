<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/consoles.php');

$consoles = getConsoles();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/consoles/index.php');