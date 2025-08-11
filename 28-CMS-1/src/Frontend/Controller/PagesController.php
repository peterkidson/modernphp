<?php

namespace App\Frontend\Controller;

class PagesController extends AbstractController
{
	public function showpage($page) {
		$this->render('pages/showpage', []);
	}
}