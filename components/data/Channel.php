<?php

namespace frontend\components\data;

class Channel
{
    public static function data()
    {
        return [
            [
                'avatar' => '/admin/dist/img/user1-128x128.jpg',
                'title' => 'Brad Diesel',
                'description' => 'Call me whenever you can...',
                'datetime' => '4 Hours Ago',
            ],
            [
                'avatar' => '/admin/dist/img/user3-128x128.jpg',
                'title' => 'Nora Silvester',
                'description' => 'The subject goes here',
                'datetime' => '1 Hour Ago',
            ],
            [
                'avatar' => '/admin/dist/img/user8-128x128.jpg',
                'title' => 'John Pierce',
                'description' => 'I got your message bro',
                'datetime' => '2 Hours Ago',
            ]
        ];
    }
}