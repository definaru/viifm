<?php
namespace frontend\panel\models\helper;

use Yii;
use yii\bootstrap5\Html;
use common\models\User;


// use frontend\panel\models\helper\PanelWord;
class PanelWord 
{

    public static function writeGreeting()
    {
        $hourAssign = date("H");
        if (($hourAssign >= 0) && ($hourAssign < 5)) {
            $say = "Доброй ночи";
        } elseif (($hourAssign >= 10) && ($hourAssign < 18 ) ) {
            $say = "Добрый день";
        } elseif (($hourAssign >= 18 ) && ($hourAssign < 24)) {
            $say = "Добрый вечер";
        } else {$say = "Доброе утро";}
        return $say;
    }


    public static function HelloUser()
    {
        $profile = self::getUserName();
        list(
            $id, $account, $firstname, $lastname, $about, 
            $position, $phone, $adress, $telegram, $skype, 
            $useragent, $created_at, $avatar
        ) = $profile;

        $isName = $profile ? $firstname : Yii::$app->user->identity->username;
        return self::writeGreeting().', '.$isName;
    }


    public static function getUserName()
    {
        $profile = User::getUserProfile();
        return isset($profile) ? $profile : null;
    }


    public static function getGravatarImage($default = 'https://api.dicebear.com/9.x/lorelei/png', $size = 200)
    {
        $email = Yii::$app->user->identity->email;
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?d=' . urlencode($default) . '&s=' . $size;
    }


    public static function getDiff($summa = '', $sell = '')
    { 
        // PanelWord::getDiff($summa, $sell); 
        // 1) сколько собрали 
        // 2) общая сумма сбора
        $procent = $sell/100;  
        return round($summa/$procent);
    }


    public function geoGetAdress() 
    {
        return 'https://api.db-ip.com/v2/free/'.Yii::$app->request->userIP;
    }
    

    public function getIPname() 
    {
        $json = file_get_contents(self::geoGetAdress());
        $data = json_decode($json);
        return $data;
    }


    public static function phone($phone, $options = [])
    {
        $options['href'] = 'tel:+'.$phone;
        $options['target'] = '_blank';
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $phone, $options);
    }


    public static function map($map, $options = []) 
    {
        $options['href'] = 'https://www.google.ru/maps/search/'.$map;
        $options['target'] = '_blank';
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $map, $options);
    }


    public static function skype($skype, $options = [])
    {
        $options['href'] = 'skype:'.$skype.'?call';
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $skype, $options);
    }
    

    public static function telegram($telegram, $options = [])
    {
        $options['href'] = 'tg://resolve?domain='.$telegram;
        if (!isset($options['class'])) {
            $options['class'] = '';
        }
        return Html::tag('a', $telegram, $options);
    }

}