<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 14:23
 */

namespace app\widgets;

use app\models\Menu;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class NavbarWidget
 * @package app\widgets
 *
 * @author Hendri Gunawan
 * @email <hendri.gnw@gmail.com>
 * 
 * @params category Menu->category
 */

class NavbarWidget extends Widget
{
	public $category =  Menu::CATEGORY_LANDING;
	
    public function run()
    {
        return $this->render($this->renderView(), [
			'data' => $this->data(),
		]);
    }
	
	/**
	 * Render view
	 * 
	 * @return string
	 */
	private function renderView()
	{
		switch($this->category) {
			case Menu::CATEGORY_LANDING:
				return 'nav-bar-landing';
			case Menu::CATEGORY_MAIN:
				return 'nav-bar-main';
			case Menu::CATEGORY_BACKEND:
				return 'nav-bar-backend';
		}
	}

	/**
	 * list data
	 * 
	 * @return type
	 */
    private function data()
    {
		$data = null;
    	switch($this->category) {
			case Menu::CATEGORY_LANDING:
				$data = $this->dataLanding(); break;
			case Menu::CATEGORY_MAIN:
				$data = $this->dataMain(); break;
			case Menu::CATEGORY_BACKEND:
				$data = $this->dataBackend(); break;
		}
		
		return $data;
    }
	
	/**
	 * data backend
	 * 
	 * @return array
	 */
	private function dataBackend()
	{
		$items = Menu::listBackend();
		
		$data = [];
		if(!$items) {
			return $data;
		}
		
		$no = 1;
		foreach($items as $item)
		{
			$data[$no]['label'] = $item->name;
			if(count($item->menuChildren) > 0) {
				$noChild = 1;
				foreach($item->menuChildren as $child) {
					$data[$no]['items'][$noChild]['label'] = $child->name;
					$data[$no]['items'][$noChild]['url'] = [$child->url];
					$noChild++;
				}
				$no++;
				continue;
			}
			$data[$no]['url'] = [$item->url];
			$no++;
		}

		$another = Yii::$app->user->isGuest ? ([['label' => 'Login', 'url' => ['/hen-admin/login']]]) : 
			(
				['<li>'
				. Html::beginForm(['/hen-admin/default/logout'], 'post', ['class' => 'navbar-form'])
				. Html::submitButton(
					'Logout ('.Yii::$app->user->getIdentity()->email.')',
					['class' => 'btn btn-link']
				)
				. Html::endForm()
				. '</li>']
			);
		return ArrayHelper::merge($data, $another);
	}
	
	/**
	 * Data Landing
	 * 
	 * @return string
	 */
	private function dataLanding()
	{
		$items = Menu::listLanding();
		
		$data = null;
		if(!$items) {
			return $data;
		}
		
		$no = 1;
		foreach($items as $item) {
			$active = ($no==1) ? 'active' : '';
			$data .= "<li class='scroll {$active}'>".Html::a($item->name, $item->url, ['title'=>$item->name])."</li>";
			$no++;
		}
		
		return $data;
	}
	
	/**
	 * Data Main
	 * 
	 * @return string
	 */
	private function dataMain()
	{
		$items = Menu::listMain();
		
		
		
		$data = null;
		if(!$items) {
			return $data;
		}
		
		$no = 1;
		foreach($items as $item) {
			$active = (Yii::$app->request->url==$item->url) ? 'active' : '';
			$data .= "<li class='scroll {$active}'>".Html::a($item->name, Yii::$app->urlManager->createUrl([$item->url]), ['title'=>$item->name])."</li>";
			$no++;
		}
		
		return $data;
	}
}