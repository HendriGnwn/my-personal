<?php

namespace app\widgets;

class ContactWidget extends BaseWidget
{
	public $model;
	
    public function run()
    {
        return $this->render('contact', [
			'bioProfile' => $this->bioProfile,
			'model' => $this->model,
		]);
    }
}