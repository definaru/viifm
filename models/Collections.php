<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


class Collections extends ActiveRecord
{
    
    public static function tableName()
    {
        return "collections";
    }

    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Название сборника указать обязательно'],
            ['tags', 'required', 'message' => 'Укажите теги для сборника'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['url'], 'default', 'value'=> 'https://t.me/viifm_lux'],
            [['uid'], 'default', 'value'=> '0'],
            ['uid', 'unique', 'message' => 'запись с такой же ссылкой уже существует'],
        ];
    }

    public function upload()
    {
        $dir = 'data/image/collections/';
        $file = UploadedFile::getInstance($this, 'image');
        if ($file && $file->tempName) {
            $this->image = $file;
            $fileName = $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($dir.$fileName);
            $this->image = $fileName; // без этого ошибка
            $this->image = '/'.$dir . $fileName;
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'ID сборника',
            'collection_uid' => 'UUID',
            'name' => 'Название сборника',
            'tags' => 'Тематика',
            'image' => 'Обложка сборника',
            'url' => 'Гиперссылка'
        ];
    }


    public static function getAllTags()
    {
        $collections = self::find()->all();
        $allTags = [];
        foreach ($collections as $collection) {
            $tags = explode(',', $collection->tags);
            $allTags = array_merge($allTags, $tags);
        }
        $allTags = array_map('trim', $allTags);
        $uniqueTags = array_unique($allTags);

        $tagsObject = [];
        foreach ($uniqueTags as $tag) {
            $tagsObject[$tag] = $tag;
        }
        return $tagsObject;
    }

    public function getTracks()
    {
        return $this->hasMany(Track::class, ['id_collection' => 'collection_uid'])->orderBy(['truck_number' => SORT_ASC]);
    }


    public function parseTrack($item)
    {
        if (preg_match('/^(.*?)\s*—\s*(.*?)\s*-\s*(.*?)$/u', $item, $m)) {
            return [trim($m[1]), trim($m[2]), trim($m[3])];
        }
        if (preg_match('/^(.*?)\s*—\s*(.*?)\s*\((.*?)\)$/u', $item, $m)) {
            return [trim($m[1]), trim($m[2]), trim($m[3])];
        }
        if (preg_match('/^(.*?)\s*—\s*(.*?)$/u', $item, $m)) {
            return [trim($m[1]), trim($m[2]), ''];
        }
        return ['', trim($item), ''];
    }


    public function updateMarkdown($id_collection, $datetime = '')
    {
        if (Yii::$app->user->isGuest || !Yii::$app->user->can('admin')) {
            throw new \yii\web\ForbiddenHttpException('Доступ запрещён');
        } else {
            $collection = Collections::find()
                ->where(['collection_uid' => $id_collection])
                ->with('tracks')
                ->one();

            if (!$collection) {
                throw new \yii\web\NotFoundHttpException('Сборник не найден');
            } else {
                $playlist = '';
                foreach ($collection->tracks as $track) {
                    list($artist, $title, $mix) = $this->parseTrack($track->artist . ' — ' . $track->name);
                    $playlist .= "- ### $artist\n  $title";
                    if ($mix) {
                        $playlist .= " _($mix)_";
                    }
                    $playlist .= "\n\n";
                }

                $image = $collection->image;
                $url = $collection->url;
                $name = $collection->name;
                $filePath = Yii::getAlias('@frontend/web/data/channel/content/ANNONCE.md');
                $markdownContent = "$datetime\n\n [![$name]($image)][1]\n\n\n# [\"$name\"][1]\n\n---\n\n$playlist\n\n\n[1]: $url";
                file_put_contents($filePath, $markdownContent);        
            }
        }
    }

}