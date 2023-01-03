<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');

$features = getFeatures();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/features/index.php');