<?php

namespace frontend\components\apexcharts;

use yii\web\View;
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\assets\ChartAsset;


class Apexcharts extends Widget
{
    public $id = 'chart';
    public $script = '';
    public $options = [];

    public function init()
    {
        $this->registerClientScript();
        parent::init();
    }

    public function run()
    {
        return $this->render('charts', ['id' => $this->id]);
    }

    public function registerClientScript()
    {
        $this->options = ArrayHelper::merge(
            $this->options, [$this->script]
        );

        ChartAsset::register($this->view);
        $options = Json::encode($this->options);
        $id = $this->id;
        $script = $this->script;

        $js = <<<JS
        $id.updateOptions({
            $script
        });
        JS;

        $this->view->registerJs("
        document.addEventListener('DOMContentLoaded', function () {
            let $id = new ApexCharts(document.querySelector('#$id'), $options);
            $id.render(); 
            $js
        });
        $(document).on('pjax:success', function() {
            if(document.readyState === 'complete') {
                let $id = new ApexCharts(document.querySelector('#$id'), $options);
                $id.render(); 
                $js
            }  
        });
        ", View::POS_END);
        // $(document).on('pjax:success', function() {});
        // $this->view->registerJs(, View::POS_END);
    }
}