<?php

namespace frontend\auth;


class AuthModule extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\auth\controllers';

    public function init()
    {
        parent::init();
        $this->layout = 'auth';
    }

}