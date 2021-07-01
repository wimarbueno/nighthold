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
            'name'  => 'Stormrage X7',
            'slug'  => 'stormrage-x7',
            'type'  => 'wotlk',                                 //// Не изменять
            'type_server' => 'Обычный',                         //// Не изменять
            'ip'  => '185.71.65.236',                           //// Не изменять
            'port'  => '8085',                                  //// Не изменять
            'connectionAuth' => 'WotlkAuth',                    //// Не изменять
            'connectionChatacters' => 'WotlkChatacters',        //// Не изменять
            'connectionWorld' => 'WotlkWorld',                  //// Не изменять
        ]
    ]
];
