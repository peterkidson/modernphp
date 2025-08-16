<?php

namespace App\Frontend\Controller;

use App\Repo\PagesRepo;

abstract class AbstractCtlr {
	public function __construct(protected PagesRepo $pagesRepo) {}

	protected function render(string $view, array $params = []) {
		extract($params);
		ob_start();
		require __DIR__ . "/../../../views/frontend/{$view}.view.php";
		$contents = ob_get_clean();
		$allPages = $this->pagesRepo->fetchAll();
		require __DIR__ . "/../../../views/frontend/layouts/main.view.php";
	}
	protected function error404() {
		http_response_code(404);
		$this->render('abstract/error404',[]);
	}
}