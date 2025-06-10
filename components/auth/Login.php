<?php
namespace frontend\components\auth;

use Yii;
use yii\bootstrap5\Html;
use frontend\components\icons\Icons;
use frontend\components\language\Language;


class Login
{

    public static function login()
    {
        $logout = Html::a(Icons::LogoutSession(), ['/site/logout'], [
            'class' => 'btn btn-light',
            'data-bs-toggle' => 'tooltip',
            'data-bs-placement' => 'bottom',
            'data-bs-custom-class' => 'album-tooltip',
            'data-bs-title' => 'Выйти',
            'data-method' => 'post'
        ]);
        $text = Html::tag(
            'span', 
            Yii::$app->user->identity->username, 
            ['class' => 'd-md-none d-inline-block ms-2 ms-md-0']
        );
        $login = Html::a(
            Icons::Person(30).$text,
            '/panel/profile', 
            ['class' => 'btn btn-outline-light border-0 border-vii']
        ).$logout;
        return $login;
    }


    public static function signin()
    {
        if (Yii::$app->user->isGuest) {
            echo Html::tag(
                'div', 
                Language::switcher(), 
                ['class' => 'px-4 px-md-0 d-grid mb-3 mb-md-0']
            );
            echo Html::tag(
                'div',
                Html::a(
                    Yii::t('vii', 'Login'), 
                    '/auth/signin', 
                    [
                        'class' => 'btn btn-lg btn-light py-1 px-4',
                        'rel' => 'nofollow noindex'
                    ]
                ),
                ['class' => ['d-grid d-md-flex px-4 px-md-0']]
            );
        } else {
            echo Html::tag(
                'div', 
                Language::switcher().self::login(), 
                ['class' => 'd-md-flex d-grid flex-row gap-2 align-items-center px-5 px-md-0']
            );
        }
    }
}