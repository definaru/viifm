<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Shop extends ActiveRecord
{
    // 'dbSqlite' => [
    //     'class' => 'yii\db\Connection',
    //     'dsn' => 'sqlite:'. realpath(__DIR__ . '/../../'))."/sqlite.db",
    //     'charset' => 'utf8',
    //     'enableSchemaCache' => true,
    // ],
    // public static function getDb()
    // {
    //     return \Yii::$app->dbSqlite;
    // }

    static public function tableName()
    {
        return "shop";
    }

    public function rules()
    {
        // return [
        //     [['name'], 'required'],
        //     [['name'], 'string', 'max' => 50],
        //     // ...
        // ];
    }

    public function attributeLabels()
    {
        // return [
        //     'id' => 'ID',
        //     'name' => 'Name',
        //     // ...
        // ];
    }

}