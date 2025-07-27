<?php

use src\WorldCityModel;

require __DIR__ . '/inc/all.inc.php';

$mh = new WorldCityModel();
$mh->city = 'Maidenhead';
$mh->population = 1000;

$cities = [ $mh ];

render('index.view', ['cities' => $cities]);