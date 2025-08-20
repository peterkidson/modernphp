<?php

global $pdo;

use App\Frontend\Ctlr\NotFoundCtlr;
use App\Frontend\Ctlr\PagesCtlr;
use App\Repo\PagesRepo;

require __DIR__ . '/inc/all.inc.php';

$route = @(string) ($_GET['route'] ?? 'pages');

$pagesRepo = new PagesRepo($pdo);

if ($route === 'pages') {
	$page = @(string)($_GET['page'] ?? 'index');

	$pagesRepo = new PagesRepo($pdo);
	$pagesCtlr = new PagesCtlr($pagesRepo);
	$pagesCtlr->showpage($page);
}
else {
	$notFoundCtlr = new NotFoundCtlr($pagesRepo);
	$notFoundCtlr->error404();
}