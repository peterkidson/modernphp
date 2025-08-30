<?php

namespace App\Admin\Ctlr;

use App\ACommon\BaseAbstractCtl;
use App\Repo\PagesRepo;

abstract class AbstractAdminCtl extends BaseAbstractCtl{
	public function __construct() {}

	protected function render(string $view, array $params = []) {
		extract($params);
		ob_start();
		require __DIR__ . "/../../../views/admin/{$view}.view.php";
		$contents = ob_get_clean();
		require __DIR__ . "/../../../views/admin/layouts/main.view.php";
	}

}