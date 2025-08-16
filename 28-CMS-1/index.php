<?php

global $pdo;

use App\Frontend\Controller\NotFoundCtlr;
use App\Frontend\Controller\PagesCtlr;
use App\Repo\PagesRepo;

require __DIR__ . '/inc/all.inc.php';

$route = @(string) ($_GET['route'] ?? 'pages');

if ($route === 'pages') {
	$page = @(string)($_GET['page'] ?? 'index');

	$pagesRepo = new PagesRepo($pdo);
	$pagesCtl = new PagesCtlr($pagesRepo);
	$pagesCtl->showpage($page);
}
else {
	$notFoundCtl = new NotFoundCtlr();
	$notFoundCtl->error404();
}