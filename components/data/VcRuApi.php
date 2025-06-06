<?php
namespace frontend\components\data;

use GuzzleHttp\Client;


class VcRuApi
{
    public static function getBlog($id)
    {
        try { // 2294632
            $client = new Client();
            $response = $client->request('GET', 'https://api.vc.ru/v2.31/subsite?id='.$id, []);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }

    
    public static function getSubscribers($id)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://api.vc.ru/v2.5/subsite/subscribers?page=0&subsiteId='.$id, []);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }


    public static function getSubScriptions($id)
    {
        try { // 2294632
            $client = new Client();
            $response = $client->request('GET', 'https://api.vc.ru/v2.5/subsite/subscriptions?page=0&subsiteId='.$id, []);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return $data;
    }


    public static function getTimeline($id)
    {
        try { // 2294632
            $client = new Client();
            $response = $client->request('GET', 'https://api.vc.ru/v2.8/timeline?markdown=true&sorting=new&subsitesIds='.$id, []);
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