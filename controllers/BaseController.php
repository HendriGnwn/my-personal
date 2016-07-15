<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;

/**
 * Description of BaseController
 *
 * @author Hendri Gunawan
 * @email <hendri.gnw@gmail.com>
 */
class BaseController extends Controller
{
	public function beforeAction($action) {
		$result = parent::beforeAction($action);

		$this->view->registerLinkAlternate();
		$this->view->registerLinkCanonical();
		
		return $result;
	}
}
