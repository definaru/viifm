<?php
namespace frontend\models;

use yii\db\ActiveRecord;


class Purchase extends ActiveRecord
{
    public static function tableName()
    {
        return "purchase";
    }

    public function rules()
    {
        return [
            // ['name', 'required', 'message' => 'Название сборника указать обязательно'],
            // ['tags', 'required', 'message' => 'Укажите теги для сборника'],
            // [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            // [['url'], 'default', 'value'=> 'https://t.me/viifm_lux'],
            // [['uid'], 'default', 'value'=> '0'],
            // ['uid', 'unique', 'message' => 'запись с такой же ссылкой уже существует'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название канала',
            'description' => 'Описание канала',
            'followers' => 'Число подписчиков',
            'image' => 'Обложка канала',
            'theme' => 'Тематика',
            'url' => 'Ссылка на канал',
            'note' => 'Заметка',
            'datetime' => 'Дата добавления канала',
        ];
    }

}