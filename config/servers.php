<?php

return [
    'realm' => [
        '1' => [
            'id'   => 1,
            'name' => 'Shadowlands',
            'slug' => 'shadowlands',
            'type' => 'sl',                                     //// Не изменять
            'connectionAuth' => 'ShadowlandsWotlk',             //// Не изменять
            'connectionChatacters' => 'ShadowlandsWotlk',       //// Не изменять
            'connectionWorld' => 'ShadowlandsWotlk',            //// Не изменять
        ],
        '2' => [
            'id'    => 2,
            'name'  => 'Wrath of the Lich King',
            'slug'  => 'wrath-of-the-lich-king',
            'type'  => 'wotlk',                                  //// Не изменять
            'connectionAuth' => 'AuthWotlk',                     //// Не изменять
            'connectionChatacters' => 'ChatactersWotlk',         //// Не изменять
            'connectionWorld' => 'WorldWotlk',                   //// Не изменять
        ]
    ]
];
