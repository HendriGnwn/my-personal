<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 16:09
 */

namespace app\widgets;

use app\models\Statistic;
use yii\base\Widget;

class StatisticWidget extends Widget
{
    public function run()
    {
        return $this->render('statistic', [
			'items' => $this->listStatistic(),
		]);
    }
	
	private function listStatistic()
	{
		$query = Statistic::find()->active()->ordered()->all();
		if(!$query) {
			return false;
		}
		
		return $query;
	}
}