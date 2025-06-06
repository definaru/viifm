<?php
namespace frontend\components\data;

use Yii;
use GuzzleHttp\Client;
use Google_Client;

/**
 * Name: Google Auth
 * Description of Google Auth
 * 
 * @author Defina
 * 
 * clientId: Yii::$app->googleClient->clientId;
 * clientSecret: Yii::$app->googleClient->clientSecret;
 * redirectUri: Yii::$app->googleClient->redirectUri;
 */
class GoogleAuth
{

    public $clientId;
    public $clientSecret;
    public $redirectUri;


    public static function createGoogleAuthUrl()
    {
        $client = Yii::$app->googleClient->getClient();
        return $client->createAuthUrl();
    }


    public function getAccessToken($code)
    {
        $client = new Client();
        $url = 'https://oauth2.googleapis.com/token';
        $data = [
            'code' => $code,
            'client_id' => Yii::$app->googleClient->clientId,
            'client_secret' => Yii::$app->googleClient->clientSecret,
            'redirect_uri' => Yii::$app->googleClient->redirectUri,
            'grant_type' => 'authorization_code',
        ];
        try {
            $response = $client->post($url, ['form_params' => $data]);
            $result = json_decode($response->getBody()->getContents(), true);
            if (isset($result['access_token'])) {
                Yii::$app->session->set('access_token', $result['access_token']);
            }
            return $result;
        } catch (\Exception $e) {
            return 'Ошибка: ' . $e->getMessage();
        }
    }


    public static function getCallback()
    {
        $url = 'https://www.googleapis.com/oauth2/v3/userinfo';
        $access_token = Yii::$app->session->get('access_token');
        try {
            $client = new Client();
            $headers = ['Authorization' => 'Bearer ' . $access_token];
            $response = $client->request('GET', $url, ['headers' => $headers]);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }

    
}