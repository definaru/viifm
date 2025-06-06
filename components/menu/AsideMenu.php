<?php

namespace frontend\components\menu;

use yii\base\Widget;


class AsideMenu extends Widget
{
    public $nav = [];

    public function run()
    {
        return $this->render('menu', ['nav' => $this->nav]);
    }
}