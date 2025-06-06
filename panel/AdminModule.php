<?php

namespace frontend\panel;


class AdminModule extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\panel\controllers';

    public function init()
    {
        parent::init();
        $this->layout = 'admin';
    }

}