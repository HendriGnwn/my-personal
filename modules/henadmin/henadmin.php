<?php

namespace app\modules\henadmin;

use Yii;
use yii\base\Module;

/**
 * hen-admin module definition class
 */
class henadmin extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\henadmin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        //set themes to backend theme
        Yii::$app->setComponents([
            'view' => [
                'theme' => [
                    'pathMap' => ['@app/views' => '@app/themes/backend/views'],
                    'baseUrl' => '@app/themes/backend/views',
                ],
                'class' => 'app\components\View',
            ],
        ]);
		
        if (Yii::$app->user->getIsGuest()) {
            Yii::$app->user->loginRequired();
        }
        // custom initialization code goes here
    }
}
