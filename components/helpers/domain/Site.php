<?php
namespace frontend\components\helpers\domain;

use Yii;

class Site
{
    public static function getBaseUrl()
    {
        // $request = Yii::$app->request;
        // $protocol = $request->isSecureConnection ? 'https' : 'http';
        // $hostInfo = $request->hostInfo;
        // $baseUrl = $protocol . '://' . $hostInfo;
        return 'https://viifm.art';
    }
}