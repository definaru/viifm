<?php

namespace frontend\components\data;


class Menu
{
    public static function Links()
    {
        return [
            [
                'header' => 'данные'
            ],
            [
                'header' => '',
                'title' => 'Dashboard',
                'icon' => 'Dashboard',
                'label' => 'dashboard',
                'badge' => null,
                'sub' => [
                    [
                        'title' => 'Данные о канале',
                        'href' => '/panel/dashboard'
                    ],
                    [
                        'title' => 'Статистика запросов',
                        'href' => '/panel/dashboard/stat'
                    ],
                    [
                        'title' => 'Полезные ссылки',
                        'href' => '/panel/dashboard/links'
                    ],
                ]
            ],
            [
                'header' => '',
                'title' => 'Аналитика',
                'icon' => 'Monitoring',
                'label' => '/panel/analitics',
                'badge' => null,
                'sub' => null
            ],
            [
                'header' => '',
                'title' => 'Контакты',
                'icon' => 'UserGroup',
                'label' => '/panel/contacts',
                'badge' => null,
                'sub' => null
            ],
            [
                'header' => '',
                'title' => 'Widgets',
                'icon' => 'Plugins',
                'label' => '/panel/widgets',
                'badge' => 'New',
                'sub' => null
            ],
            [
                'header' => 'менеджмент'
            ],
            [
                'header' => '', //  
                'title' => 'Закупка',
                'icon' => 'Bolt',
                'label' => 'purchase',
                'badge' => null,
                'sub' => [
                    [
                        'title' => 'Добавить канал',
                        'href' => '/panel/purchase/addchannel'
                    ],
                    [
                        'title' => 'Список каналов',
                        'href' => '/panel/purchase/channels'
                    ],
                    [
                        'title' => 'Список упоминаний',
                        'href' => '/panel/purchase/mentions'
                    ],
                ]
            ],
            [
                'header' => '',
                'title' => 'Calendar',
                'icon' => 'Calendar',
                'label' => '/panel/calendar',
                'badge' => null,
                'sub' => null
            ],
            [
                'header' => '',
                'title' => 'Gallery',
                'icon' => 'Gallery',
                'label' => '/panel/gallery',
                'badge' => null,
                'sub' => null
            ],
            [
                'header' => '',
                'title' => 'Kanban Board',
                'icon' => 'KanbanBoard',
                'label' => '/panel/kanban',
                'badge' => null,
                'sub' => null
            ],
            [
                'header' => '',
                'title' => 'Сценарий',
                'icon' => 'Script',
                'label' => '/panel/scripts',
                'badge' => null,
                'sub' => null
            ],
            [
                'header' => 'ресурсы'
            ],
            [
                'header' => '',
                'title' => 'Список видеоклипов',
                'icon' => 'LibraryMovie',
                'label' => '/panel/video',
                'badge' => null,
            ],
            [
                'header' => '',
                'title' => 'Список треков',
                'icon' => 'LibraryMusic',
                'label' => 'playlist',
                'badge' => null,
                'sub' => [
                    [
                        'title' => 'Плэйлист',
                        'href' => '/panel/playlist/music'
                    ],
                    [
                        'title' => 'Сборники',
                        'href' => '/panel/playlist/collections'
                    ],
                ]
            ],
        ];
    }
}