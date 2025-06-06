<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class OrderForm extends Model
{

    public $email;
    public $agree;

    public function rules()
    {
        return [
            ['email', 'required', 'message' => 'Укажите ваш электронный адрес'],
            ['email', 'email', 'message' => 'Указанный адрес не является электронной почтой'],
        ];
    }


    public static function layout($email)
    {
        $msd = '<b>Новый заказ #'.time().'</b>'.PHP_EOL.
            '<i>Виниловая пластинка</i>'.PHP_EOL.
            '<i>Real Sadness & Other Gregorian Mysteries</i>'.PHP_EOL.
            '<b>'.$email.'</b>';
        return $msd;
    }

    public static function getMessageTelegram($email)
    {
        $msd = self::layout($email);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telegram.org/bot'.env('TELEGRAM_TOKEN').'/sendMessage',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'text='.urlencode($msd).'&chat_id='.env('TELEGRAM_ID').'&parse_mode=HTML',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}