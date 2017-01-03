<?php

namespace app\widgets;

use yii\base\Widget;

/**
 * Footer Widget
 * @author Hendri Gunawan
 * @email hendri.gnw@gmail.com
 *
 */

class FooterWidget extends Widget
{
    public function run()
    {
        return $this->render('footer');
    }
}