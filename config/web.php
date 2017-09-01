<?php

$params = require(__DIR__ . '/params.php');

$config = [
     'timezone' => 'America/Mexico_City',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
   // 'language' => 'es',
    'language' => 'es',
    'bootstrap' => ['log'],
    'components' => [
         'assetManager' => [
        'linkAssets' => true,
        ], 
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JDqkJaMgIITAKcsJY6yvLQdM9jf7WghX',
        ],
        'pdf'=>[
            'class'=>'app\components\ExportToPdf',
        ],
        'excel'=>[
            'class'=>'app\components\ExportToExcel',
        ],
        'aes'=>[
            'class'=>'app\components\Aes',
        ],
        'aesctr'=>[
            'class'=>'app\components\AesCtr',
        ],
        'operaciones'=>[
            'class'=>'app\components\Operaciones',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'dateformatter'=>[
            'class'=>'app\components\DateFormat',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
          'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'google' => [
                'class' => 'yii\authclient\clients\Google',
                'clientId' => '243454299382-dsiu8lh9bnqkrfe2o2e3mhtk390b9r00.apps.googleusercontent.com',
                'clientSecret' => 'Ture36uu_QL4P2d2Dnu8OAaG',
                //'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',

            ],
        ],
    ],
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
               // 'viewPath' => '@common/mail',
                'transport' => [
                    'class' => 'Swift_MailTransport',
                ],
                'useFileTransport' => false,
            ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
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
          'formatter' => [
            'dateFormat' => 'dd-MM-yyyy',
            'datetimeFormat' => 'php:d-m-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'Rs.',
            'class' => 'yii\i18n\Formatter',
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
         'db2' => require(__DIR__ . '/db2.php'),
         'db3' => require(__DIR__ . '/db3.php'),
        
      
        
    ],
    'params' => $params,
     'modules' => [
           'db-manager' => [
            'class' => 'bs\dbManager\Module',
            // path to directory for the dumps
            'path' => '@app/backups',
            // list of registerd db-components
            'dbList' => ['db'],
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                       // 'roles' => ['admin'],
                    ],
            ],
        ]
        ],
          'datecontrol' =>  [
        'class' => '\kartik\datecontrol\Module',
        
          ],
    
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ],
        'catalogos' => [
            'class' => 'app\modules\catalogos\CatalgosModule',
        ],
        'soporte' => [
            'class' => 'app\modules\soporte\SoporteModule',
        ],
        'lab' => [
            'class' => 'app\modules\lab\labModule',
        ],
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
        ],
        'dashboard' => [
            'class' => 'app\modules\dashboard\DashboardModule',
        ],
        'informes' => [
            'class' => 'app\modules\informes\InformesModule',
        ],
        'docente' => [
            'class' => 'app\modules\docente\DocenteModule',
        ],
        'inventario' => [
            'class' => 'app\modules\inventario\InventarioModule',
        ],
        'inventario' => [
            'class' => 'app\modules\inventario\InventarioModule',
        ],
        'telefonia' => [
            'class' => 'app\modules\telefonia\TelefoniaModule',
        ],
        'rights' => [
        'class' => 'mdm\admin\Module',
        'controllerMap' => [
                    'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'user_id', // id field of model User
                    'usernameField' => 'user_login_id', // username field of model User
                   ],
            ],
        ],
    ],
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
        //'allowedIPs' => ['132.248.152.124']
    ];
}

return $config;
