<?php

namespace frontend\components\data;

class Notifications
{

    public static function data()
    {
        return [
            [
                'icon' => 'Mail',
                'title' => '4 new messages',
                'time' => '3 mins'
            ],
            [
                'icon' => 'UserGroup',
                'title' => '8 friend requests',
                'time' => '12 hours'
            ],
            [
                'icon' => 'Note',
                'title' => '3 new reports',
                'time' => '1 days'
            ]
        ];
    }

}