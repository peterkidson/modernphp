<?php

namespace App\Frontend\Controller;

class NotFoundCtl extends AbstractCtl
{
	public function error404() {
		http_response_code(404);
		$this->render('notFound/error404',[]);
	}
}