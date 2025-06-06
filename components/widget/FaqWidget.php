<?php

namespace frontend\components\widget;

use Yii;
use yii\base\Widget;
use frontend\models\Faq;


class FaqWidget extends Widget
{

    public function run()
    {
        $cache = Yii::$app->cache;
        $cacheKey = 'faq_' . Yii::$app->language;
        $faqs = $cache->get($cacheKey);
        if ($faqs === false) {
            $faqs = Faq::getFaqsByLanguage();
            $cache->set($cacheKey, $faqs, 30 * 24 * 60 * 60);
        }
        return $this->render('faq', ['faqs' => $faqs]);
    }
    
}