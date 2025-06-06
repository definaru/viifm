<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class LanguageController extends Controller
{
    public function actionChange($language)
    {
        if (in_array($language, Yii::$app->params['languages'])) {
            Yii::$app->language = $language;
            Yii::$app->session->set('language', $language);
            
            $cookie = new Cookie([
                'name' => 'language',
                'value' => $language,
                'expire' => time() + 365 * 24 * 60 * 60, // 1 year
            ]);
            Yii::$app->response->cookies->add($cookie);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}