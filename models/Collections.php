<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Collections extends ActiveRecord
{
    static public function tableName()
    {
        return "collections";
    }
}