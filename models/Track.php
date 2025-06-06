<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\components\data\Spotify;


class Track extends ActiveRecord
{

    public static function tableName()
    {
        return "tracks";
    }


    public static function getPlaylist($id)
    {
        return Spotify::getTrack($id);
    }

    // public static function getPlaylist()
    // {
    //     try {// Yii::getAlias('@web').
    //         $filePath = Yii::getAlias('@frontend/web/data/playlist.json');
    //         $jsonString = file_get_contents($filePath);
    //         $data = json_decode($jsonString, true);
    //     } catch (\Exception $e) {
    //         $data = [
    //             'status' => 'error', 
    //             'error' => $e->getMessage()
    //         ];
    //     }
    //     return $data;
    // }

    public static function findObjectByKey($array, $key, $value) 
    {
        foreach ($array as $item) {
            if (is_array($item)) {
                $result = self::findObjectByKey($item, $key, $value);
                if ($result !== null) {
                    return $result;
                }
            } elseif (isset($array[$key]) && $array[$key] == $value) {
                return $array;
            }
        }
        return null;
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
            'id'                 => 'ID', 
            'uid'                => 'UID',
            'image'              => 'Обложка',
            'artist'             => 'Исполнитель',
            'name'               => 'Название',
            'album'              => 'Альбом',
            'datetime'           => 'Дата добавления',
            'duration_ms'        => 'Продолжительность',
            'href'               => 'Ссылка на трек',
            'link_album'         => 'Ссылка на альбом',
            'truck_number'       => 'Номер трека',
            'id_collection'      => 'Сборник',
            'release_date'       => 'Дата релиза',
            'album_track_number' => 'Номер трека',
            'album_total_tracks' => 'Всего треков'
        ];
    }

    public function getCollection()
    {
        return $this->hasOne(Collections::class, ['collection_uid' => 'id_collection']);
    }

}