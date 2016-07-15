<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Hendri Gunawan <hendri.gnw@gmail.com>
 */
class LandingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\FontAwesomeAsset',
    ];

    public function init()
    {
        parent::init();

        $this->css = [
            'themes/'.THEME.'/css/animate.min.css',
            'themes/'.THEME.'/css/lightbox.min.css',
            'themes/'.THEME.'/css/'.(YII_ENV_DEV ? 'lightbox.css' : 'lightbox.min.css'),
            'themes/'.THEME.'/css/'.(YII_ENV_DEV ? 'main.css' : 'main.min.css'),
            'themes/'.THEME.'/css/presets/'.(YII_ENV_DEV ? 'preset1.css' : 'preset1.min.css'),
            'themes/'.THEME.'/css/'.(YII_ENV_DEV ? 'responsive.css' : 'responsive.min.css'),
        ];

        $this->js = [
            'themes/'.THEME.'/js/bootstrap.min.js',
            'http://maps.google.com/maps/api/js?sensor=true',
            'themes/'.THEME.'/js/jquery.inview.min.js',
            'themes/'.THEME.'/js/wow.min.js',
            'themes/'.THEME.'/js/mousescroll.js',
            'themes/'.THEME.'/js/jquery.countTo.js',
            'themes/'.THEME.'/js/lightbox.min.js',
            'themes/'.THEME.'/js/'.(YII_ENV_DEV ? 'landing.js' : 'landing.min.js'),
        ];
    }
}
