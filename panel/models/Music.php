<?php
namespace frontend\panel\models;

use yii\helpers\ArrayHelper;


class Music
{
    public static function getArtist($name)
    {
        $title = ArrayHelper::getColumn($name, 'name');
        return trim(implode(", ", $title));
    }
}