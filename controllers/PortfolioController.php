<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\HttpException;

/**
 * Description of PortfolioController
 *
 * @author Hendri Gunawan
 * @email hendri.gnw@gmail.com
 */
class PortfolioController extends BaseController
{
	public function actionAjaxDetail()
	{
		try {
			if(!Yii::$app->request->isAjax) {
				throw new \yii\base\Exception('Page should be accessible in ajax.');
			}
		
			return $this->renderAjax('ajax-detail');
			
		} catch (Exception $ex) {
			$message = $ex->getMessage();
			
			throw new HttpException(403, $message);
			
		}
	}
}
