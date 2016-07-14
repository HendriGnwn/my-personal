<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
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
            'themes/'.THEME.'/css/lightbox.css',
            'themes/'.THEME.'/css/main.css',
            'themes/'.THEME.'/css/presets/preset1.css',
            'themes/'.THEME.'/css/responsive.css',
        ];

        $this->js = [
            'themes/'.THEME.'/js/bootstrap.min.js',
            //'http://maps.google.com/maps/api/js?sensor=true',
            'themes/'.THEME.'/js/jquery.inview.min.js',
            'themes/'.THEME.'/js/wow.min.js',
            'themes/'.THEME.'/js/mousescroll.js',
            'themes/'.THEME.'/js/jquery.countTo.js',
            'themes/'.THEME.'/js/lightbox.min.js',
            'themes/'.THEME.'/js/main.js',
        ];
    }
}