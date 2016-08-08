<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends BaseController
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
		$this->layout = 'landing';
		
		$bioProfile = Yii::$app->bioProfile->data;
		
		$this->view->registerMetaKeywords($bioProfile->metakey);
		$this->view->registerMetaDescription($bioProfile->metadesc);
		
		$socialMedia = [
			'title' => 'Web Developer - '. Yii::$app->name,
			'description' => $bioProfile->metadesc,
		];
		$this->view->registerMetaSocialMedia($socialMedia);
		
		$model = new ContactForm();
		
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted', Yii::$app->params['subjectMailContact']);

            return $this->refresh('#contact-form');
        }
		
		return $this->render('index', [
			'contactModel' => $model
		]);
    }

    public function actionLogin()
    {
		$this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->setReturnUrl(['hen-admin/default/index']);
            return $this->goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->user->setReturnUrl(['hen-admin/default/index']);
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}
