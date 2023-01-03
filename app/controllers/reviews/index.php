<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');

$reviews = getReviews();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/reviews/index.php');