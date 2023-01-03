<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/models/articles.php');

$news = getNews();

require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/news/index.php');