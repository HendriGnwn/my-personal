<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 15:49
 */

namespace app\widgets;

class EmployementWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('employement', [
			'bioProfile' => $this->bioProfile
		]);
    }
}