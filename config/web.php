<?php

require(__DIR__ . '/active-theme.php');

$params = require(__DIR__ . '/params.php');
$mailer = require(__DIR__ . '/mailer.php');
$urlManager = require(__DIR__ . '/url-manager.php');
$db = require(__DIR__ . '/db.php');
$theme = require(__DIR__ . '/theme.php');
$theme = new ThemeConfig(THEME);

$config = [
    'id' => 'basic',
    'name' => 'Hendri Gunawan',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'hen-admin' => [
            'class' => 'app\modules\henadmin\henadmin',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fCOsQ5-fhCVwNEwQKqknfo9E4UaffojJ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mailer,
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => $urlManager,
        'view' => [
            'theme' => $theme->getConfig(),
            'class' => 'app\components\View',
        ],
		'bioProfile' => [
			'class' => 'app\models\BioProfile',
		],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;