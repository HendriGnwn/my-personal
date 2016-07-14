<?php

namespace app\widgets;

class AboutUsWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('about-us', [
			'bioProfile' => $this->bioProfile
		]);
    }
}