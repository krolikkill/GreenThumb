<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\jui\JuiAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://cdn.jsdelivr.net/npm/jquery-ui@1.12.1',
                    'js' => [
                        'jquery-ui.min.js',
                    ],
                    'css' => [
                        'themes/smoothness/jquery-ui.min.css',
                    ],
                ],
                'yii\bootstrap5\BootstrapAsset' => [
                    'css' => ['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'],
                    'js' => ['https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js']
                ],
            ],
            ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'plants' => 'plant/index',
                'plants/<id:\d+>' => 'plant/view',
                'forum/category/<id:\d+>' => 'forum/category',
                'forum' => 'forum/index',
                'cabinet' => 'cabinet/index',
                'cabinet/add-plant' => 'cabinet/add-plant',
                'cabinet/plant/<id:\d+>' => 'cabinet/view-plant',
                'cabinet/add-care-log/<plant_id:\d+>' => 'cabinet/add-care-log',
                'cabinet/profile' => 'cabinet/profile',
                'cabinet/update-care-log/<id:\d+>' => 'cabinet/update-care-log',
                'cabinet/delete-care-log/<id:\d+>' => 'cabinet/delete-care-log',
            ],
        ],
        'as access' => [
            'class' => 'yii\filters\AccessControl',
            'except' => ['index', 'view', 'category'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'on afterLogin' => function($event) {
                if ($event->identity->isAdmin()) {
                    Yii::$app->response->redirect(['/admin'])->send();
                    Yii::$app->end();
                }
            }

        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
