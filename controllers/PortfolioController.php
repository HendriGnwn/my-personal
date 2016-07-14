<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Description of PortfolioController
 *
 * @author Hendri Gunawan
 * @email hendri.gnw@gmail.com
 */
class PortfolioController extends Controller {
	
	public function actionAjaxDetail()
	{
		if(Yii::$app->request->isAjax) {
			return $this->renderAjax('ajax-detail');
		}
		
		throw new HttpException(404, 'File not found!.');
	}
}
