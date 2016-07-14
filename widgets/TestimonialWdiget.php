<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/27/2016
 * Time: 15:55
 */

namespace app\widgets;


use yii\base\Widget;

class TestimonialWdiget extends Widget
{
    public function run()
    {
        return $this->render('testimonial');
    }
}