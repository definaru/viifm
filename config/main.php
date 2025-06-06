<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    'name' => 'Vii FM',
    'components' => [
        'view' => [
            'theme' => [
               'pathMap' => [
                  '@app/views' => '@frontend/views'
               ],
            ],
        ],
        'telegram' => [
            'class' => 'frontend\components\data\Telegram',
            'apikey' => env('TELEGRAM_TOKEN'),
            'url' => 'https://api.telegram.org/bot',
            'username' => 'viifm_lux'
        ],
        'googleClient' => [
            'class' => 'frontend\components\data\GoogleClientComponent',
            'clientId' => env('GOOGLE_CLIENTID'),
            'clientSecret' => env('GOOGLE_CLIENTSECRET'),
            'redirectUri' => env('GOOGLE_REDIRECTURI'),
        ],
        'tgstat' => [
            'class' => 'frontend\components\data\TGStatAPI',
            'apikey' => env('TGS_TOKEN'),
            'url' => 'https://api.tgstat.ru'
        ],
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => '/auth/signin'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'enabled' => false
                ],
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<action>' => 'site/<action>',
                '/auth/<action:(signin|signup|request-password-reset)>' => 'auth/auth/<action>',
                '/panel/<action:(widgets|contacts|kanban|profile|dashboard|analitics|calendar|gallery|purchase|search|scripts)>' => 'panel/admin/<action>',
                '/panel/dashboard/<action:(stat|links|notifications)>' => 'panel/admin/<action>',
                '/panel/playlist/collections' => 'panel/admin/collections',
                '/panel/playlist/music' => 'panel/admin/playlist',
                '/panel/video/<action:(view|update)>/<uuid:[\w_\/-]+>' => 'panel/video/<action>',
                '/panel/playlist/music/<id:[\w_\/-]+>' => 'panel/admin/track',
                '/panel/profile/<account:[\w_\/-]+>' => 'panel/admin/account',
                '/panel/playlist/collections/view/<collection_uid:[\w_\/-]+>' => 'panel/collections/view',
                '/panel/playlist/collections/<action:(update|delete)>/<id:\d+>' => 'panel/collections/<action>',
                '/panel/playlist/collections/create' => 'panel/collections/create',
                '/panel/purchase/<action:(addchannel|channels|mentions)>' => 'panel/channel/<action>',
                '/panel/channel/<action:(view|update)>/<id:[\w_\/-]+>' => 'panel/channel/<action>',
                '/panel/setting/profile/<action:(update)>' => 'panel/profile/<action>'
            ],
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ]
    ],
    'modules' => [
        'auth' => [
            'class' => 'frontend\auth\AuthModule',
        ],
        'panel' => [
            'class' => 'frontend\panel\AdminModule',
        ]
    ],
    'params' => $params,
];