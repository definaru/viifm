<?php

namespace frontend\components\box;

use Yii;
use yii\base\Widget;


class ChannelBox extends Widget
{
    
    public $date;
    public $tools;


    public function run()
    {
        $cache = Yii::$app->cache;
        $cacheKey = 'widget_channel_box';
        $html = $cache->get($cacheKey);
        //$cache->delete($cacheKey);
        if ($html === false) {
            $html = $this->generateHtml();
            $cache->set($cacheKey, $html, 7200); // 24\86400
        }
        return $html;
    }

    private function generateHtml()
    {
        return $this->render('channel', [
            'date' => $this->date,
            'tools' => $this->tools,
        ]);
    }
}