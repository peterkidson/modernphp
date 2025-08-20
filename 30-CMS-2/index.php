<?php

global $pdo;

use App\Frontend\Ctlr\NotFoundCtlr;
use App\Frontend\Ctlr\PagesCtlr;
use App\Repo\PagesRepo;
use App\Support\Container;

require __DIR__ . '/inc/all.inc.php';

$container = new Container();

$container->bind('pdo', function () {
	return require __DIR__ . '/inc/db-connect.inc.php';
});
$container->bind('pagesRepo', function () use ($container) {
	$pdo = $container->get('pdo');
	return new PagesRepo($pdo);
});
$container->bind('pagesCtlr', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new PagesCtlr($pagesRepo);
});
$container->bind('notFoundCtlr', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new NotFoundCtlr($pagesRepo);
});

$pdo = $container->get('pdo');

$route = @(string) ($_GET['route'] ?? 'pages');

$pagesRepo = new PagesRepo($pdo);

if ($route === 'pages') {
	$page = @(string)($_GET['page'] ?? 'index');

	$pagesCtlr = $container->get('pagesCtlr');
	$pagesCtlr->showpage($page);
}
else {
	$notFoundCtlr = $container->get('notFoundCtlr');
	$notFoundCtlr->error404();
}