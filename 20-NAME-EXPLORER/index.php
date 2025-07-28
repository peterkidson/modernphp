<?php

require __DIR__ . '/inc/all.inc.php';

$overview = fetchNamesOverview();

crender('index.view', ['overview' => $overview]);