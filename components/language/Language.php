<?php
namespace frontend\components\language;

use Yii;
use yii\bootstrap5\Html;


class Language
{

    public static function getLanguage($lang)
    {
        return strtr($lang, [
            'et' => 'Eesti',
            'ru' => 'Русский',
            'en' => 'English',
            'ge' => 'ქართული' 
        ]);
    }


    public static function list()
    {
        $list = '';
        foreach(Yii::$app->params['languages'] as $item) {
            $options = ['class' => 'dropdown-item'];
            if ($item === Yii::$app->language) {
                Html::addCssClass($options, ['active']);
            }
            $list .= Html::tag('li', 
                Html::a(
                    self::getLanguage($item), 
                    ['language/change', 'language' => $item], 
                    ['class' => $options]
                )
            );
        }
        return Html::tag('ul', $list, ['class' => 'dropdown-menu border-0 shadow']);
    }


    public static function switcher()
    {
        $image = Html::img(
            '/admin/dist/img/flags/'.Yii::$app->language.'.svg', 
            [
                'style' => 'border-radius: 10px;width: 30px;height:30px'
            ]
        );
        $text = Html::tag('span', 'Language selection', ['class' => 'd-md-none d-inline-block ms-2 ms-md-0']);
        $bl = Html::tag(
            'div', 
            $image.$text, 
            [
                'class' => 'p-0', 
                'type'=> 'button', 
                'data-bs-toggle' => 'dropdown', 
                'aria-expanded' => false
            ]
        );
        $list = self::list();
        return Html::tag('div', $bl.$list, ['class' => 'btn dropdown border-vii']);
    }

}