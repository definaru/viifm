<?php
namespace frontend\assets;

use yii\web\AssetBundle;


class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/css/plugins/calendar/full.calendar.css',
    ];
    public $js = [
        'admin/plugins/calendar/calendar.min.js',
        'admin/plugins/calendar/locales-all.min.js',
        //'admin/plugins/calendar/main.js',
    ]; 
}