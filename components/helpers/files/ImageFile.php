<?php

namespace frontend\components\helpers\files;

use Yii;
use yii\helpers\FileHelper;
use frontend\components\data\Telegram;
use yii\web\Cookie;


class ImageFile
{

    public static function getDir($id)
    {
        return Yii::getAlias('@webroot/data/channel/avatars/'.$id);
    }


    public static function getImageChannel()
    {
        //$session_id = Yii::$app->session->id;
        //$cookie_session_id = Yii::$app->request->cookies->getValue('session_id', '');
        $photo_id = self::getPhotoByID();
        $dir = self::getDir($photo_id);
        //if ($cookie_session_id !== $session_id) {
            if (is_dir($dir)) {
                FileHelper::removeDirectory($dir);
            }
            FileHelper::createDirectory($dir, 0777, true);
        //}
    }

    public static function getPhotoByID()
    {
        $chatData = Telegram::getChannelInfo();
        return $chatData['result']['photo']['big_file_id'];
    }


    public static function createLinkOfImage()
    {
        self::getImageChannel();
        $token = Yii::$app->telegram->apikey;
        $photo_id = self::getPhotoByID();
        $dir = self::getDir($photo_id);
        if(isset($photo_id) && is_dir($dir)) {
            $fileData = Telegram::getChannelAvatar($photo_id);
            $filePath = $fileData['result']['file_path'];

            $avatarUrl = "https://api.telegram.org/file/bot$token/$filePath";
            $avatarContent = file_get_contents($avatarUrl);
            $fileName = basename($filePath);
            file_put_contents("$dir/$fileName", $avatarContent);

            Yii::$app->response->cookies->add(new Cookie([
                'name' => 'session_id',
                'value' => Yii::$app->session->id,
                'expire' => time() + 3600,
            ]));
        }

    }

}