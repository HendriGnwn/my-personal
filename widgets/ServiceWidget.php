<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 15:09
 */

namespace app\widgets;

class ServiceWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('service', [
			'bioProfile' => $this->getBioProfile(),
			'services' => $this->listService(),
		]);
    }
	
	private function listService()
	{
		$query = \app\models\Service::find()->active()->all();
		
		if(!$query) {
			return false;
		}
		
		return $query;
	}
}