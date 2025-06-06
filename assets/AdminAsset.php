<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AdminAsset extends AssetBundle 
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'admin/plugins/fontawesome-free/css/all.min.css',
        //'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        //'admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        //'admin/plugins/jqvmap/jqvmap.min.css',
        'admin/css/adminlte.min.css?v=3.2.0',
        'admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        //'admin/plugins/daterangepicker/daterangepicker.css',
        //'admin/plugins/summernote/summernote-bs4.min.css',
        //'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap5\BootstrapAsset',
        //'yii\\bootstrap5\\BootstrapPluginAsset'
    ];
    public $js = [
        'admin/plugins/jquery-ui/jquery-ui.min.js',
        'admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
        // 'admin/plugins/chart.js/Chart.min.js',
        // 'admin/plugins/sparklines/sparkline.js',
        // 'admin/plugins/jqvmap/jquery.vmap.min.js',
        // 'admin/plugins/jqvmap/maps/jquery.vmap.usa.js',
        // 'admin/plugins/jquery-knob/jquery.knob.min.js',
        // 'admin/plugins/moment/moment.min.js',
        // 'admin/plugins/daterangepicker/daterangepicker.js',
        // 'admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        // 'admin/plugins/summernote/summernote-bs4.min.js',
        //'admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'admin/dist/js/adminlte.js?v=3.2.0',
        //'admin/dist/js/demo.js',
        //'admin/dist/js/pages/dashboard.js'
    ]; 

    // public function init()
    // {
    //     if(\Yii::$app->controller->action->id === 'view') {
    //         $this->js[] = 'data/js/save.preview.js';
    //     }
    // }

}