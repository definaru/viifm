<?php

namespace frontend\components\data;

use Yii;
use GuzzleHttp\Client;

/**
 * Name: AI Defina
 * Description of Telegram Bot
 * 
 * @author Defina LLC
 * 
 * apikey: Yii::$app->telegram->apikey;
 * url: Yii::$app->telegram->url;
 * username: Yii::$app->telegram->username;
 */

class Telegram 
{

    public $apikey;
    public $url;
    public $username;


    public static function Request($method = 'GET', $query, $params = [])
    {
        $url = Yii::$app->telegram->url.Yii::$app->telegram->apikey.$query;
        try {
            $client = new Client();
            $response = $client->request($method, $url, $params);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }


    public static function getInfoOnBot()
    {
        // -1001867870805
        return self::Request('GET', '/getUpdates');
    }


    public static function getChannelInfo($id = '')
    {
        $id = $id === '' ? Yii::$app->telegram->username : $id;
        $url = 'https://api.telegram.org/bot'.Yii::$app->telegram->apikey.'/getChat?chat_id=@'.$id;
        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }


    public static function getChannelAvatar($id)
    {
        $url = 'https://api.telegram.org/bot'.Yii::$app->telegram->apikey.'/getFile?file_id='.$id;
        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }

    public static function getMembersCount($id = '')
    {
        $id = $id === '' ? Yii::$app->telegram->username : $id;
        $url = 'https://api.telegram.org/bot'.Yii::$app->telegram->apikey.'/getChatMembersCount?chat_id=@'.$id;
        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }



    public static function getChannelByID($id)
    {
        $count = self::getMembersCount($id);
        $channel = self::getChannelInfo($id);
        $image = $channel["result"]["photo"]["big_file_id"];
        $channel_photo = self::getChannelAvatar($image);
        $file = $channel_photo['result']['file_path'];
        $data = [
            'session_id' => Yii::$app->session->id,
            'id' => $channel["result"]["id"],
            'title' => $channel["result"]["title"],
            'username' => $channel["result"]["username"],
            'description' => $channel["result"]["description"],
            'photo' => 'https://api.telegram.org/file/bot6135179732:AAEIG_6mi_0mjrdyooIDmw3VhfOMMmG0Pk8/'.$file,
            'members' => $count["result"]
        ];
        return $data;
    }



    // Создать пригласительную ссылку
    // https://api.telegram.org/bot6135179732:AAEIG_6mi_0mjrdyooIDmw3VhfOMMmG0Pk8/createChatInviteLink?chat_id=@viifm_lux&name=Test23

    // Удалить пригласительную ссылку
    // https://api.telegram.org/bot6135179732:AAEIG_6mi_0mjrdyooIDmw3VhfOMMmG0Pk8/revokeChatInviteLink?chat_id=@viifm_lux&invite_link=https://t.me/+amkArZBA6XU0MWZi

}