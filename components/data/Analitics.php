<?php
namespace frontend\components\data;

use Yii;


class Analitics
{

    public static function Indicators($traffic)
    {
        return [
            [
                'icon' => 'WebTraffic',
                'color' => 'bg-indigo',
                'header' => 'Средний охват (1 пуб.)',
                'preffix_right' => 'просмотров',
                'number' => number_format($traffic["response"]["avg_post_reach"] ?? 0)
            ],
            [
                'icon' => 'Heart',
                'color' => 'bg-danger',
                'header' => 'Индекс цитирования (ИЦ)',
                'preffix_right' => '%',
                'number' => round($traffic["response"]["ci_index"] ?? 0, 1)
            ],
            [
                'icon' => 'ShoppingCart',
                'color' => 'bg-success',
                'header' => 'Средний рекламный охват',
                'preffix_right' => 'за публикацию',
                'number' => number_format($traffic["response"]["adv_post_reach_24h"] ?? 0)
            ],
            [
                'icon' => 'UserGroup',
                'color' => 'bg-warning',
                'header' => 'Cуммарный дневной охват',
                'preffix_right' => 'просмотров',
                'number' => number_format($traffic['response']['daily_reach'] ?? 0)
            ]
        ];
    }


    
    public static function channelInfo()
    {
        $count = Telegram::getMembersCount();
        $channel = Telegram::getChannelInfo();
        $id = $channel["result"]["photo"]["big_file_id"];
        $channel_photo = Telegram::getChannelAvatar($id);
        $file = basename($channel_photo['result']['file_path']);
        $data = [
            'session_id' => Yii::$app->session->id,
            'id' => $channel["result"]["id"],
            'title' => $channel["result"]["title"],
            'username' => $channel["result"]["username"],
            'description' => $channel["result"]["description"],
            'photo' => '/data/channel/avatars/'.$id.'/'.$file,
            'photo_id' => $id,
            'members' => $count["result"]
        ];
        return $data;
    }



    public static function channelMenu()
    {
        return [
            [
                'href'=> 'https://tgstat.ru/channel/@viifm_lux/stat', 
                'target'=> '_blank',
                'title' => 'Посмотреть статистику',
                'divider' => ''
            ],
            [
                'href'=> 'https://t.me/viifm_lux', 
                'target'=> '_blank',
                'title' => 'Перейти на канал',
                'divider' => '-'
            ],
            [
                'href'=> 'https://t.me/+d8cWP6dAeIM2ZDky', 
                'target'=> '_blank',
                'title' => 'Шаблоны креативов',
                'divider' => ''
            ]
        ];
    }

}