<?php

namespace App\Admin\Ctlr;

use App\ACommon\BaseAbstractCtlr;
use App\Repo\PagesRepo;

abstract class AbstractAdminCtlr extends BaseAbstractCtlr{
	public function __construct() {}

	protected function render(string $view, array $params = []) {
		extract($params);
		ob_start();
		require __DIR__ . "/../../../views/admin/{$view}.view.php";
		$contents = ob_get_clean();
		require __DIR__ . "/../../../views/admin/layouts/main.view.php";
	}

}