<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/*
* @id 
* @language 
* @title 
* @body 
*/

class Faq extends ActiveRecord
{

    public static function tableName()
    {
        return 'faq';
    }

    public static function getFaqsByLanguage()
    {
        return self::find()->where(['language' => Yii::$app->language])->all();
    }

}