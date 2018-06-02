<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'loglass',
    'name' => 'Loglass',
    'version' => '1.0',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log'
    ],
    
    'language' => 'zh-CN',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'loglassSecret'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache'
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [
                        'error',
                        'warning'
                    ]
                ]
            ]
        ],
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        
        'formatter' => [
            'timeZone' => 'Asia/Shanghai',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'dateFormat' => 'yyyy-MM-dd',
            'timeFormat' => 'HH:mm:ss'
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'baseUrl' => '@web/css/',
                    'css' => [
                        'bootstrap.min.css'
                    ], // 去除 bootstrap.css
                    'sourcePath' => null // 防止在 frontend/web/asset 下生产文件
                ]
            ]
        ]
        // 'mailer' => [
        // 'class' => 'yii\swiftmailer\Mailer',
        // 'useFileTransport' => false,
        // 'transport' => [
        // 'class' => 'Swift_SmtpTransport',
        // 'host' => 'smtp.ndabooking.com',
        // 'username' => '',
        // 'password' => '',
        // 'port'=>25,
        // // 'port' => '465',
        // // 'encryption' => 'ssl'
        // ]
        // ]
        
    // 'urlManager' => [
        // 'enablePrettyUrl' => true,
        // 'showScriptName' => false,
        
    // 'rules' => [
        // ],
        // ],
    ],
    'params' => $params
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module'
        // uncomment the following to add your IP if you are not connecting from localhost.
        // 'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module'
        // uncomment the following to add your IP if you are not connecting from localhost.
        // 'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
