<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class ChartAsset extends AssetBundle 
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $depends = [];
    public $js = [
        'https://cdn.jsdelivr.net/npm/apexcharts'
    ]; 
}