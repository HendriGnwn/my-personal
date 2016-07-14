<?php

namespace app\widgets;

class ContactWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('contact', [
			'bioProfile' => $this->bioProfile
		]);
    }
}