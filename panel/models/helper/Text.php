<?php

namespace frontend\panel\models\helper;

use yii\helpers\Html;


class Text
{
    public static function wrapLinksInATag($text) 
    {
        $pattern = '/(https?:\/\/[^\s]+)/';
        $replacement = Html::a("$1", "$1", ['target' => '_blank']);
        return preg_replace($pattern, $replacement, $text);
    }

    public static function declension($n, $s1, $s2, $s3)
    {
        $m = $n % 10; $j = $n % 100;
        if($m==0 || $m>=5 || ($j>=10 && $j<=20)) {return $n.' '.$s3;}
        if($m>=2 && $m<=4) {return  $n.' '.$s2;}
        return $n.' '.$s1;
    }

    public static function InsertTagWord($name = '', $path = '', $parametr = []) 
    {
        $aRes = []; 
        $data = explode(', ', $name);
        foreach ($data as $item) {$aRes[] = Html::a($item, '#', $parametr);}
        return implode(' ', $aRes);
    }

    public static function getColorOfTariff($text)
    {
        $parts = explode("(", $text);
        $tariff = rtrim($parts[1], ")");
        $tariff_colors = [
            'тариф FREE' => 'bg-teal',
            'тариф S'    => 'bg-primary',
            'тариф M'    => 'bg-lightblue',
            'тариф L'    => 'bg-purple',
            'тариф XL'   => 'bg-indigo'
        ];
        $color = $tariff_colors[$tariff];
        $options = ['class' => 'badge font-mono'];
        Html::addCssClass($options, $color);
        
        $badge = Html::tag('span', $tariff, $options);
        return $parts[0] .'&#160;'. $badge;
    }
}