<?php

namespace App\Frontend\Ctlr;

use App\ACommon\BaseAbstractCtlr;
use App\Repo\PagesRepo;

abstract class AbstractCtlr extends BaseAbstractCtlr {
	public function __construct(protected PagesRepo $pagesRepo) {}

	protected function render(string $view, array $params = []) {
		extract($params);
		ob_start();
		require __DIR__ . "/../../../views/frontend/{$view}.view.php";
		$contents = ob_get_clean();
		$allPages = $this->pagesRepo->fetchForNavigation();
		require __DIR__ . "/../../../views/frontend/layouts/main.view.php";
	}
}