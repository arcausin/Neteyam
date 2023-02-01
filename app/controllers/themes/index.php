<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/themes.php');

$themes = getThemes();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/themes/index.php');