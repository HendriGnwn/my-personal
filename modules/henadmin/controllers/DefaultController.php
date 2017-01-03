<?php

namespace app\modules\henadmin\controllers;

use app\models\BioProfile;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\HttpException;

class DefaultController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	public function actionBioProfile()
	{
		$request = Yii::$app->request;
		$model = BioProfile::findOne(BioProfile::DEFAULT_ID);
		
		if(!$model) {
			throw new HttpException(400, 'Ops, something wrong!..');
		}
		
		if ($model->load($request->post()) && $model->save()) {
			return $this->redirect(['bio-profile']);
		}
		
		return $this->render('bio-profile', [
			'model' => $model,
		]);
	}
}
