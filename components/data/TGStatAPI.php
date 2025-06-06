<?php

namespace frontend\components\data;

use Yii;
use GuzzleHttp\Client;
use yii\helpers\ArrayHelper;


class TGStatAPI
{
    public $apikey;
    public $url;


    public static function Request($method = 'GET', $query, $params = [])
    {
        $url = Yii::$app->tgstat->url.$query;
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


    public static function transformJson(array $data)
    {
        $channels = ArrayHelper::index($data['channels'], 'id');
        foreach ($data['items'] as &$item) {
            if (isset($channels[$item['channelId']])) {
                $item['channelId'] = $channels[$item['channelId']];
            }
        }
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    public static function RetrievingPublicData($id)
    {
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'postId' => $id
            ]
        ];
        return self::Request('GET', '/posts/get', $params);
    }


    public static function getBroadcastStats()
    {
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'channelId' => 'https://t.me/'.Yii::$app->telegram->username
            ]
        ];
        return self::Request('GET', '/channels/stat', $params);
    }

    
    public static function getCategories()
    {
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'lang' => 'ru'
            ]
        ];
        return self::Request('GET', '/database/categories', $params);
    }

    public static function getCountries()
    {
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'lang' => 'ru'
            ]
        ];
        return self::Request('GET', '/database/countries', $params);
    }

    public static function getLanguages()
    {
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'lang' => 'ru'
            ]
        ];
        return self::Request('GET', '/database/languages', $params);
    }

    public static function getChannelsSearch()
    {
        $countries = Yii::$app->request->get('countries');
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'q' => Yii::$app->request->get('q'),
                'peer_type' => 'channel',
                'country' => isset($countries) ? $countries : 'ru',
                'language' => Yii::$app->request->get('languages'),
                'category' => Yii::$app->request->get('categories'),
                'limit' => 100
            ]
        ];
        return self::Request('GET', '/channels/search', $params);
    }

    public static function getChannelsMentions()
    {
        $params = [
            'query' => [
                'token' => Yii::$app->tgstat->apikey, 
                'channelId' => '@'.Yii::$app->telegram->username,
                'startDate' => 1725144806,
                'endDate' => time(),
                'limit' => 50,
                'extended' => 1
            ]
        ];
        $model = self::Request('GET', '/channels/mentions', $params)["response"];
        $result = self::transformJson($model);
        return json_decode($result, true)['items'];
    }


}