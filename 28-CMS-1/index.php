<?php

require __DIR__ . '/inc/all.inc.php';

$page = @($_GET['page'] ?? 'index');

switch ($page) {
	case 'index':
		echo 'Index page';
		break;
	default:
		$nfc = new \App\Frontend\Controller\NotFoundController();
		$nfc->error404();
		break;
}