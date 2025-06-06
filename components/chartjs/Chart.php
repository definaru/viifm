<?php

namespace frontend\components\card;

use yii\base\Widget;


class Chart extends Widget
{
    // https://github.com/onixsib/yii2-chartjs-widget/tree/master
    // https://www.chartjs.org/docs/master/getting-started/

    /*
        Извлечение столбцов
        Часто нужно извлечь столбец значений из многомерного массива или объекта. Например, список ID.

        $array = [
            ['id' => '123', 'data' => 'abc'],
            ['id' => '345', 'data' => 'def'],
        ];
        $ids = ArrayHelper::getColumn($array, 'id');
    */

    public $options = [];

    public function run()
    {
        return $this->render('chart', ['options' => $this->options]);
    }
}