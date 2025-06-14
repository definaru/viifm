<?php

namespace frontend\components\data;

// use frontend\components\data\SocialLinkData;
// SocialLinkData::links();
class SocialLinkData
{
    public static function links()
    {
        return [
            [
                'href' => 'https://t.me/viifm_lux',
                'icon' => 'Telegram',
                'name' => 'Telegram',
                'size_icon' => '18',
                'hr' => '-',
            ],
            [
                'href' => 'https://x.com/vii_fm',
                'icon' => 'Twitter',
                'name' => 'Twitter',
                'size_icon' => '18',
                'hr' => '',
            ]
        ];
    }
}