<?php
namespace frontend\components\data;

use Yii;
use GuzzleHttp\Client;
//use yii\helpers\ArrayHelper;


class Spotify
{
    public static function Request($method = 'GET', $url, $params = [])
    {
        //$url = 'https://api.spotify.com/v1/';
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


    public static function getPlaylist($offset = 0, $limit = 50)
    {
        $params = [
            'headers' => [
                'Authorization' => env('SPOTIFY_BEARER'), 
                'Accept' => 'application/json'
            ]
        ];
        return self::Request('GET', 'https://api.spotify.com/v1/me/tracks?offset='.$offset.'&limit='.$limit, $params);
    }


    public static function getTrack($id)
    {
        $params = [
            'headers' => [
                'Authorization' => env('SPOTIFY_BEARER'), 
                'Accept' => 'application/json'
            ]
        ];
        return self::Request('GET', 'https://api.spotify.com/v1/tracks/'.$id, $params);
    }

}