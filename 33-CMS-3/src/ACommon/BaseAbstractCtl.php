<?php

namespace App\ACommon;

use App\Repo\PagesRepo;

abstract class BaseAbstractCtl {
	public function __construct(protected PagesRepo $pagesRepo) {}

	abstract protected function render(string $view, array $params = []);

	protected function error404() {
		http_response_code(404);
		$this->render('abstract/error404',[]);
	}
}