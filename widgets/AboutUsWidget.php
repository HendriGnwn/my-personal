<?php

namespace app\widgets;

use app\models\Skill;

class AboutUsWidget extends BaseWidget
{
    public function run()
    {
        return $this->render('about-us', [
			'bioProfile' => $this->bioProfile,
			'skill' => $this->dataSkill()
		]);
    }
	
	/**
	 * List data Skill
	 * 
	 * @return boolean
	 */
	private function dataSkill()
	{
		$query = Skill::find()->active()->ordered()->all();
		
		if(!$query) {
			return false;
		}
		
		return $query;
	}
}