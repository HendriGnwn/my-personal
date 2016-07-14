<?php
/**
 * Created by PhpStorm.
 * @author Hendri Gunawan
 * @email hendri.gnw@gmail.com
 * Date: 6/24/2016
 * Time: 16:46
 */

class ThemeConfig
{
    public $theme;

    public function __construct($theme)
    {
        $this->theme = $theme;
    }

    public function getConfig()
    {
        $config = [
            // base path of currently used theme
            'basePath' => '@app/themes/' . $this->theme,

            // web accessible path for resource (image, css, js, ...) used specifically by this theme
            // example:
            // $theme->getUrl('img/logo.png') will point to @web/themes/v1/img/logo.png file
            'baseUrl' => '@web/themes/' . $this->theme,

            'pathMap' => [
                // this is where our theme view files located
                // if requested file is not available, Yii will try to search it in default view directory (@app/view)
                // for example when we call render('index') in SiteController, Yii search for @app/themes/v1/views/site/index.php file
                // but if that file doesn't exist, then Yii will use @app/views/site/index.php instead
                //
                // so, your theme specific view files MUST be placed here.
                // your shared view files SHOULD be placed in @app/view
                '@app/views' => '@app/themes/' . $this->theme . '/views',

                // theming modules
                // rules for view above apply, so theme specific files MUST be placed here, shared files SHOULD be placed in @app/modules
                // example:
                // @app/modules/blog/views/comment/index.php  ->  @app/themes/v1/modules/blog/views/comment/index.php
                '@app/modules' => '@app/themes/' . $this->theme . '/modules',

                // theming widget
                // rules for view above apply, so theme specific files MUST be placed here, shared files SHOULD be placed in @app/widgets
                // example:
                // @app/widgets/views/footer.php  ->  @app/themes/v1/widgets/views/footer.php
                '@app/widgets' => '@app/themes/' . $this->theme . '/widgets',

                #'@dektrium/user/views' => '@app/themes/' . $this->theme . '/views/user',

            ],
        ];

        return $config;
    }
}