<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 15:51
 */

namespace app\widgets;

class EducationWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('education', [
			'bioProfile' => $this->bioProfile
		]);
    }
}