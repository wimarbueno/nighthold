<?php

    namespace App\Services;

    use Illuminate\Support\Facades\{Cache, DB};
    use App\Services\Text;
    use Illuminate\Support\Str;

    class Server {

        private static $realmsStatusCache = array();


        public static function playersOnline()
        {
            return static::getOnlinePlayers();
        }

        public static function status()
        {
            return static::getServerStatus();
        }

        public static function statusSL()
        {
            return static::getServerStatusSL();
        }

        public static function statusWotlk()
        {
            return static::getServerStatusWotlk();
        }
        public static function getServerStatusSL() {
            $server = [];
            foreach (config('servers.realm') as $item) {

                $errNo = 0;
                $errStr = 0;

                if($item['type'] === 'sl') {
                    $server[] = [
                        "name" => $item['name'],
                        "slug" => $item['slug'],
                        "locale" => "ru-RU",
                        "timezone" => self::getOnline($item['connectionChatacters']),
                        "online" => @fsockopen($item['ip'], $item['port'], $errNo, $errStr, 1) ? 'true' : 'false',
                        "category" => "Русский",
                        "type" => [
                            "id" => "1",
                            "name" => $item['type_server'],
                            "slug" => "обычный",
                            "enum" => "NORMAL",
                            "__typename" => "RealmTypeEnum"
                        ],
                        "population" => [
                            "id" => "2",
                            "name" => "Средняя",
                            "slug" => "средняя",
                            "enum" => "MEDIUM",
                            "__typename" => "RealmPopulationEnum"
                        ],
                        "__typename" => "Realm"
                    ];
                }
            }
            return [
                "data" => [
                    "GameVersions" => [
                        [
                            "name" => "Все миры",
                            "slug" => "world-of-warcraft",
                            "key" => "mainline",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Shadowlands",
                            "slug" => "shadowlands",
                            "key" => "sl",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Wrath of the Lich King",
                            "slug" => "wrath-of-the-lich-king",
                            "key" => "wotlk",
                            "__typename" => "GameVersion"
                        ]
                    ],
                    "Regions" => [
                        ["name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"]
                    ],
                    "Realms" => $server
                ]
            ];
        }

        public static function getServerStatusWotlk() {
            $server = [];
            foreach (config('servers.realm') as $item) {

                $errNo = 0;
                $errStr = 0;

                if($item['type'] === 'wotlk') {
                    $server[] = [
                        "name" => $item['name'],
                        "slug" => $item['slug'],
                        "locale" => "ru-RU",
                        "timezone" => self::getOnline($item['connectionChatacters']),
                        "online" => @fsockopen($item['ip'], $item['port'], $errNo, $errStr, 1) ? 'true' : 'false',
                        "category" => "Русский",
                        "type" => [
                            "id" => "1",
                            "name" => $item['type_server'],
                            "slug" => "обычный",
                            "enum" => "NORMAL",
                            "__typename" => "RealmTypeEnum"
                        ],
                        "population" => [
                            "id" => "2",
                            "name" => "Средняя",
                            "slug" => "средняя",
                            "enum" => "MEDIUM",
                            "__typename" => "RealmPopulationEnum"
                        ],
                        "__typename" => "Realm"
                    ];
                }
            }
            return [
                "data" => [
                    "GameVersions" => [
                        [
                            "name" => "Все миры",
                            "slug" => "world-of-warcraft",
                            "key" => "mainline",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Shadowlands",
                            "slug" => "shadowlands",
                            "key" => "sl",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Wrath of the Lich King",
                            "slug" => "wrath-of-the-lich-king",
                            "key" => "wotlk",
                            "__typename" => "GameVersion"
                        ]
                    ],
                    "Regions" => [
                        ["name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"]
                    ],
                    "Realms" => $server
                ]
            ];
        }

        public static function getServerStatus() {
            $server = [];
            foreach (config('servers.realm') as $item) {

                $errNo = 0;
                $errStr = 0;

               $server[] = [
                   "name" => $item['name'],
                   "slug" => $item['slug'],
                   "locale" => "ru-RU",
                   "timezone" => self::getOnline($item['connectionChatacters']),
                   "online" => @fsockopen($item['ip'], $item['port'], $errNo, $errStr, 1) ? 'true' : 'false',
                   "category" => "Русский",
                   "type" => [
                       "id" => "1",
                       "name" => $item['type_server'],
                       "slug" => "обычный",
                       "enum" => "NORMAL",
                       "__typename" => "RealmTypeEnum"
                   ],
                   "population" => [
                       "id" => "2",
                       "name" => "Средняя",
                       "slug" => "средняя",
                       "enum" => "MEDIUM",
                       "__typename" => "RealmPopulationEnum"
                   ],
                   "__typename" => "Realm"
               ];
            }
            return [
                "data" => [
                    "GameVersions" => [
                        [
                            "name" => "Все миры",
                            "slug" => "world-of-warcraft",
                            "key" => "mainline",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Shadowlands",
                            "slug" => "shadowlands",
                            "key" => "sl",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Wrath of the Lich King",
                            "slug" => "wrath-of-the-lich-king",
                            "key" => "wotlk",
                            "__typename" => "GameVersion"
                        ]
                    ],
                    "Regions" => [
                        ["name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"]
                    ],
                    "Realms" => $server
                ]
            ];
        }

        private static function getOnline($connection) {
            if ($connection === "WotlkChatacters") {
                $Statement = DB::connection($connection)
                    ->table('characters')
                    ->select(DB::raw('count(guid) as now_online'))
                    ->where('online', 1)
                    ->first();
                return ceil($Statement->now_online * setting('onlain.online_wotlk'));
            } else {
                $Statement = DB::connection($connection)
                    ->table('characters')
                    ->select(DB::raw('count(guid) as now_online'))
                    ->where('online', 1)
                    ->first();
                return ceil($Statement->now_online * setting('onlain.online'));
            }
        }

        public static function getServerName() {
            $realmList = DB::connection('auth')->table('realmlist')->select('name')->first();
            return $realmList->name;
        }

        public static function GetRealmIDByName($realmName)
        {
            return self::FindRealm(urldecode($realmName));
        }

        public static function FindRealm($rName) {
            foreach(config('servers.realm') as $realm) {
                if(strtolower($realm['slug']) == strtolower($rName)) {
                    return $realm['id'];
                }
            }
            return 0;
        }

        public static function IsRealm($realmName): bool
        {
            foreach(config('servers.realm') as $realm) {
                if($realm['name'] == $realmName) {
                    return true;
                }
            }
            return false;
        }

        private static function getOnlinePlayers()
        {
            $SLOnline = DB::connection('ShadowlandsChatacters')->table('characters')->where('online', 1)->count();
            $WotlkOnline = DB::connection('WotlkChatacters')->table('characters')->where('online', 1)->count();

            return ceil($SLOnline + $WotlkOnline * setting('onlain.online') * setting('onlain.online_wotlk')) ;
        }

        private static function extractFaction($race): string
        {
            $horde = array(2, 5, 6, 8, 10);

            return in_array($race, $horde) ? 'horde' : 'alliance';
        }
    }
