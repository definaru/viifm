<?php
namespace frontend\components\data;

use GuzzleHttp\Client;


class WildxApi
{

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function getIp()
    {
        $key = env('WILDX_APIKEY');
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://xgeo.wildx.ru/&apikey='.$key, []);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error', 
                'error' => $e->getMessage()
            ];
        }
        return new WildxApi($data);
    }


    public static function datetime($date, $time, $zone, $format = 'd.m.y H:i')
    {
        $dt = \DateTime::createFromFormat($format, "$date $time", new \DateTimeZone($zone));
        return $dt->format('Y-m-d\TH:i:sP');
    }


    public function all()
    {
        $ip = $this->data;
        $location = $ip["location"]["en"];
        $zone = $ip["time_zone"];
        $data = [
            'language' => strtolower($ip["country_info"]["iso_code_2"]),
            'location' => $ip["location"]["postal"].': '.$location["country"].', '.$location["region"].', '.$location["city"], 
            'phone_code' => $ip["country_info"]["phone_code"],
            'datetime' => self::datetime($zone['date'], $zone['time'], $zone['name']),
            'currency' => [
                'name' => $ip["currency"]["name"],
                'symbol' => $ip["currency"]["symbol_native"]
            ]
        ];
        return $data;
    }

}