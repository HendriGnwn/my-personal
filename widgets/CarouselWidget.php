<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 14:26
 */

namespace app\widgets;

use yii\base\Widget;

class CarouselWidget extends Widget
{
    public function run()
    {
        return $this->render('carousel');
    }
}