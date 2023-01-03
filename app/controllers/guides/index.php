<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');

$guides = getGuides();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/guides/index.php');