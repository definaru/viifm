<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'data/css/defina.min.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\\bootstrap5\\BootstrapPluginAsset'
    ];
    public $js = [
        'data/js/defina.min.js',
    ];    

    public function init()
    {
        if(\Yii::$app->controller->action->id === 'index') {
            $this->css[] = 'data/css/image.glow.css';
            $this->js[] = 'data/js/image.glow.js';
        }
    }
}