<?php

namespace App\Admin\Ctl;

use App\ACommon\BaseAbstractCtl;
use App\Admin\Support\AuthSrv;

abstract class AbstractAdminCtl extends BaseAbstractCtl{
	public function __construct(protected AuthSrv $authSrv) {}

	protected function render(string $view, array $params = []) {
		extract($params);
		ob_start();
		require __DIR__ . "/../../../views/admin/{$view}.view.php";
		$contents = ob_get_clean();

		$isLoggedIn = $this->authSrv->isLoggedIn();

		require __DIR__ . "/../../../views/admin/layouts/main.view.php";
	}

}