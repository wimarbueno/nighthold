<?php

return [
    'realm' => [
        '1' => [
            'id'   => 1,
            'name' => 'Shadowlands',
            'slug' => 'shadowlands',
            'type' => 'sl',                                     //// Не изменять
            'type_server' => 'Обычный',                         //// Не изменять
            'ip' => '91.201.41.102',                            //// Не изменять
            'port' => '8085',                                   //// Не изменять
            'connectionAuth' => 'ShadowlandsAuth',              //// Не изменять
            'connectionChatacters' => 'ShadowlandsChatacters',  //// Не изменять
            'connectionWorld' => 'ShadowlandsWorld',            //// Не изменять
        ],
        '2' => [
            'id'    => 2,
            'name'  => 'Wrath of the Lich King',
            'slug'  => 'wrath-of-the-lich-king',
            'type'  => 'wotlk',                                 //// Не изменять
            'type_server' => 'Обычный',                         //// Не изменять
            'ip'  => '91.201.41.102',                           //// Не изменять
            'port'  => '8087',                                  //// Не изменять
            'connectionAuth' => 'WotlkAuth',                    //// Не изменять
            'connectionChatacters' => 'WotlkChatacters',        //// Не изменять
            'connectionWorld' => 'WotlkWorld',                  //// Не изменять
        ]
    ]
];
