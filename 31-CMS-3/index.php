<?php

global $pdo;

use App\Admin\Ctlr\AdminPagesCtl;
use App\Admin\Ctlr\LoginCtl;
use App\Admin\Support\AuthSrv;
use App\Frontend\Ctlr\NotFoundCtl;
use App\Frontend\Ctlr\FrontendPagesCtl;
use App\Repo\PagesRepo;
use App\Support\Container;

require __DIR__ . '/inc/all.inc.php';


$container = new Container();

$container->bind('pdo', function () {
	return require __DIR__ . '/inc/db-connect.inc.php';
});
$container->bind('authServ', function () use ($container){
	$pdo = $container->get('pdo');
	return new AuthSrv($pdo);
});
$container->bind('pagesRepo', function () use ($container) {
	$pdo = $container->get('pdo');
	return new PagesRepo($pdo);
});
$container->bind('pagesCtlr', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new FrontendPagesCtl($pagesRepo);
});
$container->bind('notFoundCtlr', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new NotFoundCtl($pagesRepo);
});
$container->bind('adminPagesCtlr', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new AdminPagesCtl($pagesRepo);
});
$container->bind('loginCtlr', function () use ($container) {
	$authServ = $container->get('authServ');
	return new LoginCtl($authServ);
});

$pdo = $container->get('pdo');

$route = @(string) ($_GET['route'] ?? 'pages');

$pagesRepo = new PagesRepo($pdo);

if ($route === 'pages') {
	$page = @(string)($_GET['page'] ?? 'index');
	$pagesCtlr = $container->get('pagesCtlr');
	$pagesCtlr->showpage($page);
}
else if ($route === 'admin/login') {
	$loginCtlr = $container->get('loginCtlr');
	$loginCtlr->login();
}
else if ($route === 'admin/pages') {
	$adminPagesCtlr = $container->get('adminPagesCtlr');
	$adminPagesCtlr->index();
}
else if ($route === 'admin/pages/create') {
	$adminPagesCtlr = $container->get('adminPagesCtlr');
	$adminPagesCtlr->create();
}
else if ($route === 'admin/pages/edit') {
	$adminPagesCtlr = $container->get('adminPagesCtlr');
	$adminPagesCtlr->edit();
}
else if ($route === 'admin/pages/delete') {
//	$id = @(int)($_GET['id'] ?? 0);
	$adminPagesCtlr = $container->get('adminPagesCtlr');
	$adminPagesCtlr->delete();
}
else {
	$notFoundCtlr = $container->get('notFoundCtlr');
	$notFoundCtlr->error404();
}