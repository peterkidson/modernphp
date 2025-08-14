<?php

global $pdo;

use App\Frontend\Controller\NotFoundCtl;
use App\Frontend\Controller\PagesCtl;
use App\Repo\PagesRepo;

require __DIR__ . '/inc/all.inc.php';

$page = @($_GET['page'] ?? 'index');

switch ($page) {
	case 'index':
		$pagesRepo = new PagesRepo($pdo);

		$pagesCtl = new PagesCtl($pagesRepo);
		$pagesCtl->showpage('index');
		break;

	default:
		$notFoundCtl = new NotFoundCtl();
		$notFoundCtl->error404();
		break;
}