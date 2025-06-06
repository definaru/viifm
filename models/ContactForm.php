<?php

namespace frontend\models;

use Yii;
use yii\base\Model;



class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    //public $verifyCode;


    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Введите ваше имя'],
            ['name', 'match', 'pattern'=>'/^[а-яА-ЯёЁ]+$/u', 'message' => 'Напишите ваше реальное имя!'],
            ['subject', 'required', 'message' => 'Уточните тему письма'],
            ['email', 'required', 'message' => 'Укажите ваш электронный адрес'],
            ['body', 'required', 'message' => 'Напишите ваше сообщение'],
            ['email', 'email', 'message' => 'Указанный адрес не является электронной почтой'],
            //['verifyCode', 'required', 'message' => 'Напишите код с картинки'],
            //['verifyCode', 'captcha'],
        ];
    }


    public function attributeLabels()
    {
        return [
            //'verifyCode' => 'Verification Code',
        ];
    }


    public static function layout($name, $email, $text, $subject)
    {
        $num = time();
        $datatime = Yii::$app->formatter->asDatetime($num, 'php:d.m.Y H:i');
        $msd = '<b>Новое сообщение #'.$num.'</b>'.PHP_EOL.
            '<i>Имя: '.$name.'</i>'.PHP_EOL.
            '<i>E-mail: '.$email.'</i>'.PHP_EOL.
            '<b>Тема: '.$subject.'</b>'.PHP_EOL.
            '<pre>'.$text.'</pre>'.PHP_EOL.
            '<i>'.$datatime.'</i>';
        return $msd;
    }

    public static function getMessageTelegram($name, $email, $text, $subject)
    {
        $msd = self::layout($name, $email, $text, $subject);
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

    public function sendEmail($email)
    {
        if ($this->validate()) {
            $bot = self::getMessageTelegram($this->name, $this->email, $this->body, $this->subject);
            return Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                // Yii::$app->params['senderEmail']
                //->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setHtmlBody('<div>
                    <h4>'.$this->name.'</h4>
                    <p>От: <a href="mailto:'.$this->email.'">'.$this->email.'</a></p>
                    <pre>'.$this->body.'</pre>
                </div>')
            ->send();
            return $bot;
        }
        return false; 
    }
}
