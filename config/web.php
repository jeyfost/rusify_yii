<?php


$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '66f915885f3530d7eb9dd6fe08f279e4',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'site/index',
                'translatemanager' => 'translatemanager/language/list',
                'admin' => 'admin/role',
                'mail' => 'mail/default/index',
                '<module:users>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
                '<module:users>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:users>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:screens>/<action:(view|create|user|top|delete)>' => '<module>/default/<action>',
                '<module:screens>/<action:(view|create|user|top|delete)>/<id:\w+>' => '<module>/default/<action>',
                '<module:screens>' => '<module>/default/index',
                '<module:screens>/<action:\.*>' => '<module>/default/index',
                '<module:events>/categories' => '<module>/categories/index',
                '<module:events>/categories/<action:\.*>' => '<module>/categories/index',
                '<module:events>/categories/<action:\w+>/<id:\w+>' => '<module>/categories/<action>',
                '<module:events>/categories/<action:\w+>' => '<module>/categories/<action>',
                '<module:events>/<action:(create|delete|update)>' => '<module>/default/<action>',
                '<module:events>/<action:(create|delete|update)>/<id:\w+>' => '<module>/default/<action>',
                '<module:events>/<id:\w+>' => '<module>/default/view',
                '<module:events>' => '<module>/default/index',
                '<module:events>/<action:\.*>' => '<module>/default/index',
                '<module:content>/categories' => '<module>/categories/index',
                '<module:content>/categories/<action:\.*>' => '<module>/categories/index',
                '<module:content>/categories/<action:\w+>/<id:\w+>' => '<module>/categories/<action>',
                '<module:content>/categories/<action:\w+>' => '<module>/categories/<action>',
                '<module:content>/<action:\w+>' => '<module>/default/<action>',
                '<module:content>/<action:\w+>/<id:\w+>' => '<module>/default/<action>',
                '<module:content>' => '<module>/default/index',
                '<module:content>/<action:\.*>' => '<module>/default/index',
                '<module:pilot|fleet|events|squadron>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                '<module:pilot|fleet|events|squadron>/<action:\w+>' => '<module>/default/<action>',
                '<module:pilot|airline|fleet|events|admin|squadron|translatemanager>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
                '<module:pilot|airline|fleet|events|admin|squadron|translatemanager>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:pilot|airline|fleet|events|admin|squadron|translatemanager>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:content|pilot|fleet|events|squadron>' => '<module>/default/index',
                '<module:news|documents>/<category:\w+>/<id:.*>' => '<module>/default/view',
                '<module:news|documents>/<id:\w+>' => '<module>/default/index',
                '<module:tours|news|documents|mail>/<action:\w+>' => '<module>/default/<action>',
                '<module:tours|news|documents|mail>/<action:\w+>/<id:\w+>' => '<module>/default/<action>',
                '<module:tours|news|documents|mail>' => '<module>/default/index',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

            ]
        ],
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
