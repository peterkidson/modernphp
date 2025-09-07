<?php

global $pdo;

use App\Admin\Ctl\AdminPagesCtl;
use App\Admin\Ctl\LoginCtl;
use App\Admin\Support\AuthSrv;
use App\Frontend\Ctl\NotFoundCtl;
use App\Frontend\Ctl\FrontendPagesCtl;
use App\Repo\PagesRepo;
use App\Support\Container;


require __DIR__ . '/inc/all.inc.php';



$container = new Container();

$container->bind('pdo', function () {
	return require __DIR__ . '/inc/db-connect.inc.php';
});
$container->bind('authSrv', function () use ($container){
	$pdo = $container->get('pdo');
	return new AuthSrv($pdo);
});
$container->bind('pagesRepo', function () use ($container) {
	$pdo = $container->get('pdo');
	return new PagesRepo($pdo);
});
$container->bind('frontendPagesCtl', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new FrontendPagesCtl($pagesRepo);
});
$container->bind('notFoundCtl', function () use ($container) {
	$pagesRepo = $container->get('pagesRepo');
	return new NotFoundCtl($pagesRepo);
});
$container->bind('adminPagesCtl', function () use ($container) {
	$authSrv = $container->get('authSrv');
	$pagesRepo = $container->get('pagesRepo');
	return new AdminPagesCtl($authSrv, $pagesRepo);
});
$container->bind('loginCtl', function () use ($container) {
	$authSrv = $container->get('authSrv');
	return new LoginCtl($authSrv);
});

$pdo = $container->get('pdo');

$route = @(string) ($_GET['route'] ?? 'pages');

$pagesRepo = new PagesRepo($pdo);

if ($route === 'pages') {
	$page = @(string)($_GET['page'] ?? 'index');
	$frontendPagesCtl = $container->get('frontendPagesCtl');
	$frontendPagesCtl->showpage($page);
}
else if ($route === 'admin/login') {
	$loginCtl = $container->get('loginCtl');
	$loginCtl->login();
}
else if ($route === 'admin/logout') {
	$loginCtl = $container->get('loginCtl');
	$loginCtl->logout();
}
else if ($route === 'admin/pages') {
	$authgSrv = $container->get('authSrv');
	$authgSrv->ensureLoggedIn();
	$adminPagesCtl = $container->get('adminPagesCtl');
	$adminPagesCtl->index();
}
else if ($route === 'admin/pages/create') {
	$authgSrv = $container->get('authSrv');
	$authgSrv->ensureLoggedIn();
	$adminPagesCtl = $container->get('adminPagesCtl');
	$adminPagesCtl->create();
}
else if ($route === 'admin/pages/edit') {
	$authgSrv = $container->get('authSrv');
	$authgSrv->ensureLoggedIn();
	$adminPagesCtl = $container->get('adminPagesCtl');
	$adminPagesCtl->edit();
}
else if ($route === 'admin/pages/delete') {
	$authgSrv = $container->get('authSrv');
	$authgSrv->ensureLoggedIn();
	$adminPagesCtl = $container->get('adminPagesCtl');
	$adminPagesCtl->delete();
}
else {
	$notFoundCtl = $container->get('notFoundCtl');
	$notFoundCtl->error404();
}