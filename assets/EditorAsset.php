<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class EditorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public $js = [
        'admin/plugins/summernote/summernote-bs4.min.js',
    ];  
}