<?php

namespace frontend\components\box;

use yii\base\Widget;

// use frontend\components\box\InfoBox;
class InfoBox extends Widget
{
    public $icon = '';
    public $color = 'bg-info';
    public $header = 'Header';
    public $number = 0;
    public $preffix_left = '';
    public $preffix_right = '';

    public function run()
    {
        return $this->render('box', [
            'icon' => $this->icon,
            'color' => $this->color,
            'header' => $this->header,
            'number' => $this->number,
            'preffix_left' => $this->preffix_left,
            'preffix_right' => $this->preffix_right,
        ]);
    }

}