<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Banner;

class MainController extends Controller {

	public function indexAction() {

	    $banner = new Banner();
	    $activeBanners = $banner->getListActive();
        $vars = [
            'activeBanners' => $activeBanners,
        ];
		$this->view->render('Главная страница', $vars);
	}

}