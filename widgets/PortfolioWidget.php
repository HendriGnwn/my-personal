<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 15:34
 */

namespace app\widgets;

class PortfolioWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('portfolio', [
			'bioProfile' => $this->bioProfile
		]);
    }
}