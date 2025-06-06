<?php

namespace frontend\panel\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $chat_url          Ссылка на пост в телеграм канале
 * @property string $title             Название клипа/видео
 * @property int $duration_ms          Длительность видео в миллисекундах
 * @property string $video_preview     Превью видео (ссылка на картинку)
 * @property string|null $description  Описание видео (markdown)
 * @property string $video_uuid        Уникальный ключ для join и URL
 * @property int $created_at           Дата публикации поста (unix timestamp)
 */

class Video extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_url', 'title', 'duration_ms', 'video_preview', 'video_uuid', 'created_at'], 'required'],
            [['duration_ms', 'created_at'], 'integer'],
            [['description'], 'string'],
            [['chat_url', 'title', 'video_preview', 'video_uuid'], 'string', 'max' => 255],
            [['video_uuid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chat_url' => 'Ссылка на пост',
            'title' => 'Название',
            'duration_ms' => 'Продолжительность',
            'video_preview' => 'Превью видео',
            'description' => 'Описание',
            'video_uuid' => 'UUID видео',
            'created_at' => 'Дата публикации',
        ];
    }

    /**
     * Поиск по UUID вместо id
     * @param string $video_uuid
     * @return static|null
     */
    public static function findByUuid($video_uuid)
    {
        return static::findOne(['video_uuid' => $video_uuid]);
    }


}