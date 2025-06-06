<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\db\ActiveRecord;


class Profile extends ActiveRecord
{

    static public function tableName()
    {
        return "profile";
    }


    public function rules()
    {
        return [
            [['account', 'firstname', 'useragent'], 'required'],
            [['adress', 'telegram', 'skype', 'created_at', 'about', 'position', 'phone', 'lastname'], 'string'],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg']
        ];
    }


    public function upload()
    {// admin/
        $dir = 'dist/img/users/'.$this->account.'/';
        $fullPath = Yii::getAlias('@backendWeb/' . $dir);
        //$files = FileHelper::findDirectories($fullPath);
        try {
            FileHelper::createDirectory($fullPath);
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', "Failed to create directory: " . $e->getMessage());
        }
        $file = UploadedFile::getInstance($this, 'avatar');
        if ($file && $file->tempName) {
            $this->avatar = $file;
            $fileName = $this->avatar->baseName . '.' . $this->avatar->extension;
            $this->avatar->saveAs($fullPath.$fileName);
            $this->avatar = $fileName; // без этого ошибка
            $this->avatar = '/'.$dir . $fileName;
        }
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'username', 
            'firstname' => 'Имя', 
            'lastname' => 'Фамилия', 
            'avatar' => 'Аватар',
            'about' => 'О себе', 
            'position' => 'Должность', 
            'phone' => 'Телефон', 
            'adress' => 'Адрес', 
            'telegram' => 'Telegram', 
            'skype' => 'Skype',
            'useragent' => 'USER AGENT',
            'created_at' => 'Дата создания'
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['username' => 'account'])
            ->select('id, username, email, status, created_at');
    }
}