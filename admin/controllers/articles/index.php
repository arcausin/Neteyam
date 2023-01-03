<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/articles.php');

$articles = getArticles();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/articles/index.php');