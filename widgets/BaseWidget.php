<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;

/**
 * Description of BaseWidget
 *
 * @author Hendri Gunawan
 */
class BaseWidget extends Widget {
	
	/**
	 * return data bio profile
	 * @return type app\models\BioProfile
	 */
	protected function getBioProfile()
	{
		return \Yii::$app->bioProfile->data;
	}
}
