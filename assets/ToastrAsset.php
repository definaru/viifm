<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class ToastrAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/css/plugins/toastr/toastr.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public $js = [
        'admin/plugins/toastr/toastr.min.js'
    ]; 
}