<?php

namespace app\widgets;

class BlogWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('blog', [
			'bioProfile' => $this->bioProfile,
 		]);
    }
}