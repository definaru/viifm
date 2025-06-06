<?php
namespace frontend\models;

use yii\db\ActiveRecord;


class Event extends ActiveRecord
{
    public static function tableName()
    {
        return 'events';
    }

    public function rules()
    {
        return [
            [['title', 'start', 'type'], 'required'],
            [['start', 'end'], 'safe'],
			[['type'], 'integer'],
            [['description'], 'string'],
            [['color'], 'string', 'max' => 7],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название', 
            'type' => 'Тип события', 
            'description' => 'Описание', 
            'start' => 'Дата (Начало)', 
            'end' => 'Дата (Конец)'
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->start = date('Y-m-d\TH:i', strtotime($this->start));
            $this->end = date('Y-m-d\TH:i', strtotime($this->end));
            return true;
        }
        return false;
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->start = date('Y-m-d\TH:i', strtotime($this->start));
        $this->end = date('Y-m-d\TH:i', strtotime($this->end));
    }

}