<?php

use App\Frontend\Controller\NotFoundController;
use App\Frontend\Controller\PagesController;

require __DIR__ . '/inc/all.inc.php';

$page = @($_GET['page'] ?? 'index');

switch ($page) {
	case 'index':
		$pagesController = new PagesController();
		$pagesController->showpage('index');
		break;
	default:
		$notFoundController = new NotFoundController();
		$notFoundController->error404();
		break;
}