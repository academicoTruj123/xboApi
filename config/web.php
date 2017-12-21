<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',    
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ye-ZDBlyAhTqfgcm5BQl6y-fA1MgkLZP',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
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
            'viewPath' => '@app/mail',            
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '64.233.171.108',
                'username' => 'chab.28.08@gmail.com',
                'password' => 'Pool1207',
                'port' => '587',
                'encryption' => 'tls',   
                'streamOptions' => [ 'ssl' =>
                       [ 'allow_self_signed' => true,
                           'verify_peer' => false,
                           'verify_peer_name' => false,
                       ],
                   ]                
            ],            
        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'server161.web-hosting.com',
//                'username' => '_mainaccount@flowers.pe',
//                'password' => 'Luis.2017',
//                'port' => '465',
//                'encryption' => 'ssl',   
//                'streamOptions' => [ 'ssl' =>
//                       [ 'allow_self_signed' => true,
//                           'verify_peer' => false,
//                           'verify_peer_name' => false,
//                       ],
//                   ]      
//            ],
//            'useFileTransport' => false,    
//        ],        
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
        'urlManager' => [
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class'=>'yii\rest\UrlRule',
                    //'pluralize'=>false,
                    'controller' =>['solorest','loginrest','tablacodigorest','clienterest','ubigeorest','empresarest','usuariorest'],                  
                    'tokens'=>[
                        '{id}'=>'<id:\\w+>'
                    ],
                    'extraPatterns'=>[
                        'POST registrarlogincliente'=>'loginrest/registrarlogincliente',
                        'POST activarcuenta'=>'loginrest/activarcuenta',
                        'POST recuperarcontrasena'=>'loginrest/recuperarcontrasena',
                        'POST validarlogin'=>'loginrest/validarlogin',
                        'POST registrarloginempresa'=>'loginrest/registrarloginempresa',
                        'POST findusuarioclientexiduser'=>'clienterest/findusuarioclientexiduser',
                        'POST findusuarioempresaxiduser'=>'empresarest/findusuarioempresaxiduser',                        
                        'POST findusuarioxiduser'=>'usuariorest/findusuarioxiduser',
                        'POST updatetipouno'=>'usuariorest/updatetipouno', 
                        'POST findtablacodigoxcodigo'=>'tablacodigorest/findtablacodigoxcodigo',                                                 
                    ],
                ]
            ],
        ],     
    ],
    'params' => $params,
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\ApiModule',
        ],
    ],
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
