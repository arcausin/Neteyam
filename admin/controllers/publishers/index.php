<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/models/publishers.php');

$publishers = getPublishers();

require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/publishers/index.php');