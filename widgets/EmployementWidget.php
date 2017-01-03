<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 15:49
 */

namespace app\widgets;

use app\models\Employement;

class EmployementWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('employement', [
			'bioProfile' => $this->bioProfile,
			'employements' => $this->listEmployement(),
		]);
    }
	
	private function listEmployement()
	{
		$query = Employement::find()->active()->ordered()->all();
		
		if(!$query) {
			return false;
		}
		
		return $query;
	}
}