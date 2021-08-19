<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class Account
{
    private static $characters_data = [];

    private static $myGamesList = [];

    public static function init() {
        ///if (auth()->user()->account) {
        ///    self::LoadCharacters();
        ///}
        if (auth()->user()->accountWotlk) {
            self::LoadCharactersWotlk();
        }
    }

    private static function LoadCharactersWotlk()
    {
        self::$characters_loaded = false;
        self::$myGamesList = auth()->user()->accountWotlk->id;
        if(self::$myGamesList > 0) {
            $total_chars_count = DB::connection('WotlkAuth')->table('realmcharacters')->where('acctid', [auth()->user()->accountWotlk->id])->sum('numchars');
            self::$characters_data = DB::table("user_characters")->where('account', [auth()->user()->accountWotlk->id])->orderBy('index')->get();
        }
        else {
            $total_chars_count = 0;
        }
        if(!self::$characters_data || count(self::$characters_data) != $total_chars_count) {
            self::LoadCharactersFromWorld();
        }
        else {
            self::$characters_loaded = true;
            for($i = 0; $i < $total_chars_count; ++$i) {
                self::$characters_data[$i]->class_text = __('characters.class_' . self::$characters_data[$i]->class);
                self::$characters_data[$i]->race_text = __('characters.race_' . self::$characters_data[$i]->race);
                self::$characters_data[$i]->faction_text = Utils::faction(self::$characters_data[$i]->race)['slug'] ?? 'unknown';
                self::$characters_data[$i]->url = '';
                if(self::$characters_data[$i]->isActive) {
                    self::$active_character = self::$characters_data[$i];
                }
            }
            return;
        }
        if(!self::$characters_data) {
            return;
        }
        $active_set = false;
        $index = 0;

        $total_chars = DB::table("user_characters")->where('account', [self::$myGamesList])->sum('account');

        if ($total_chars != $total_chars_count)  {
            DB::table('user_characters')->where('account', '=', self::$myGamesList)->delete();
        }
        foreach(self::$characters_data as $char) {
            DB::table('user_characters')->insert([
                'bn_id' => auth()->user()->id,
                'account' => $char['account'],
                'index' => $index,
                'guid' => $char['guid'],
                'name' => $char['name'],
                'class' => $char['class'],
                'class_text' => $char['class_text'],
                'class_key' => $char['class_key'],
                'race' => $char['race'],
                'race_text' => $char['race_text'],
                'race_key' => $char['race_key'],
                'gender' => $char['gender'],
                'level' => $char['level'],
                'realmId' => $char['realmId'],
                'logout_time' => $char['logout_time'],
                'totaltime' => $char['totaltime'],
                'realmName' => $char['realmName'],
                'realmSlug' => $char['realmSlug'],
                'isActive' => $active_set ? 0 : 1,
                'faction' => $char['faction'],
                'faction_text' => $char['faction_text'],
                'guildId' => $char['guildId'],
                'guildName' => $char['guildName'],
                'guildUrl' => $char['guildUrl'],
                'url' => $char['url']
            ]);
            if(!$active_set) {
                self::$active_character = $char;
                $active_set = true;
            }
            ++$index;
        }
        self::$characters_loaded = true;
    }

    private static function LoadCharacters()
    {
        self::$characters_loaded = false;
        self::$myGamesList = auth()->user()->account->id;
        if(self::$myGamesList > 0) {
            $total_chars_count = DB::connection('ShadowlandsAuth')->table('realmcharacters')->where('acctid', [self::$myGamesList])->sum('numchars');
            self::$characters_data = DB::table("user_characters")->where('account', [self::$myGamesList])->orderBy('index')->get();
        }
        else {
            $total_chars_count = 0;
        }
        if(!self::$characters_data || count(self::$characters_data) != $total_chars_count) {
            self::LoadCharactersFromWorld();
        }
        else {
            self::$characters_loaded = true;
            for($i = 0; $i < $total_chars_count; ++$i) {
                self::$characters_data[$i]->class_text = __('characters.class_' . self::$characters_data[$i]->class);
                self::$characters_data[$i]->race_text = __('characters.race_' . self::$characters_data[$i]->race);
                self::$characters_data[$i]->faction_text = Utils::faction(self::$characters_data[$i]->race)['slug'];
                self::$characters_data[$i]->url = '';
                if(self::$characters_data[$i]->isActive) {
                    self::$active_character = self::$characters_data[$i];
                }
            }
            return;
        }
        if(!self::$characters_data) {
            return;
        }

        $active_set = false;
        $index = 0;

        $total_chars = DB::table("user_characters")->where('account', [self::$myGamesList])->sum('account');

        if ($total_chars != $total_chars_count)  {
            DB::table('user_characters')->where('account', '=', self::$myGamesList)->delete();
        }

        foreach(self::$characters_data as $char) {
            DB::table('user_characters')->insert([
                'bn_id' => auth()->user()->id,
                'account' => $char['account'],
                'index' => $index,
                'guid' => $char['guid'],
                'name' => $char['name'],
                'class' => $char['class'],
                'class_text' => $char['class_text'],
                'class_key' => $char['class_key'],
                'race' => $char['race'],
                'race_text' => $char['race_text'],
                'race_key' => $char['race_key'],
                'gender' => $char['gender'],
                'level' => $char['level'],
                'realmId' => $char['realmId'],
                'logout_time' => $char['logout_time'],
                'totaltime' => $char['totaltime'],
                'realmName' => $char['realmName'],
                'realmSlug' => $char['realmSlug'],
                'isActive' => $active_set ? 0 : 1,
                'faction' => $char['faction'],
                'faction_text' => $char['faction_text'],
                'guildId' => $char['guildId'],
                'guildName' => $char['guildName'],
                'guildUrl' => $char['guildUrl'],
                'url' => $char['url']
            ]);
            if(!$active_set) {
                self::$active_character = $char;
                $active_set = true;
            }
            ++$index;
        }
        self::$characters_loaded = true;
    }

    private static function LoadCharactersFromWorld()
    {
        $chars_data = array();
        self::$characters_data = array();
        $index = 0;

        $count = self::$myGamesList;
        if($count == 0) {
            return false;
        }
        foreach(config('servers.realm') as $realm_info) {
            $chars_data = DB::connection($realm_info['connectionChatacters'])->select("
                SELECT
                characters.guid,
                characters.account,
                characters.name,
                characters.class,
                characters.race,
                characters.gender,
                characters.level,
                characters.totaltime,
                characters.logout_time,
                guild_member.guildid AS guildId,
                guild.name AS guildName
                FROM characters AS characters
                LEFT JOIN guild_member AS guild_member ON guild_member.guid=characters.guid
                LEFT JOIN guild AS guild ON guild.guildid=guild_member.guildid
                WHERE account = ?",  [self::$myGamesList]);
            if(!$chars_data) {
                continue;
            }
            foreach($chars_data as $char) {
                $tmp_char_data = array(
                    'account' => $char->account,
                    'index' => $index,
                    'guid' => $char->guid,
                    'name' => $char->name,
                    'class' => $char->class,
                    'class_text' => __('characters.class_' . $char->class),
                    'class_key' => __('characters.class_key_' . $char->class),
                    'race' => $char->race,
                    'race_text' => __('characters.race_' . $char->race),
                    'race_key' => __('characters.key_race_' . $char->race),
                    'gender' => $char->gender,
                    'level' => $char->level,
                    'realmName' => $realm_info['name'],
                    'realmSlug' => $realm_info['slug'],
                    'realmId' => $realm_info['id'],
                    'totaltime' => $char->totaltime,
                    'logout_time' => $char->logout_time,
                    'isActive' => 0,
                    'faction' => Utils::faction($char->race)['name'] ?? 'unknown',
                    'faction_text' => Utils::faction($char->race)['slug'] ?? 'unknown',
                    'guildId' => $char->guildId,
                    'guildName' => $char->guildName,
                    'guildUrl' => '',
                    'url' => ''
                );
                self::$characters_data[] = $tmp_char_data;
                ++$index;
            }
        }
    }
}
