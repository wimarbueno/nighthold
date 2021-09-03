<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Races;
use App\Models\Shadowlands\Arena\ArenaSl;
use App\Models\Stream;
use App\Models\Streams;
use App\Models\Wotlk\Arena\ArenaWotlk;
use App\Services\Server;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use romanzipp\Twitch\Twitch;

class GameController extends Controller
{
    public function recruit () {
        Meta::prependTitle('Пригласи друга')
            ->setDescription('Позовите в игру друзей, чтобы вместе странствовать по Азероту и получить потрясающие награды.');
        return view('game.recruit_friend');
    }

    public function leaderboards () {
        Meta::prependTitle(' - Рейтинги подземелий с эпохальным ключом')
            ->setDescription('Просмотрите список игроков с наиболее высоким рейтингом на этой неделе. Кто занимает первое место в подземелье &quot;Кровавые катакомбы&quot;?');
        return view('game.pve.leaderboards', [
            'data' => ArenaSl::with('characters')->where('slot', 0)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30)
        ]);
    }

    public function arena ($server, $type) {
        if(Server::IsRealmBySlug($server) === false) {
            return abort(404);
        }
        if(Server::IsRealmByType($server) === 'sl') {
            if($type === '2v2') {
                $data = ArenaWotlk::with('team_member')->where('type', 2)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } elseif ($type === '3v3') {
                $data = ArenaWotlk::with('team_member')->where('type', 3)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } else {
                $data = ArenaWotlk::with('team_member')->where('type', 5)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            }
        } else {
            if($type === '2v2') {
                $data = ArenaWotlk::with('team_member')->where('type', 2)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } elseif ($type === '3v3') {
                $data = ArenaWotlk::with('team_member')->where('type', 3)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } else {
                $data = ArenaWotlk::with('team_member')->where('type', 5)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            }
        }
        Meta::prependTitle(__('theme.arena_' . $type) . ' - Рейтинговая таблица PvP')
            ->setDescription('Сильнейшие среди героев Альянса и Орды сражаются за славу на аренах и полях боя. В этой таблице указана 1000 лучших игроков вашего региона.');
        return view('game.pvp.arena', [
            'data' => $data,
            'servers' => $server,
            'type' => $type,
            'server_type' => Server::IsRealmByType($server)
        ]);
    }


    public function team ($server, $type, $team) {
        if(Server::IsRealmBySlug($server) === false) {
            return abort(404);
        }

        $data = ArenaWotlk::with('members')
            ->where('name', $team)
            ->firstOrFail();

        return view('game.pvp.team', [
            'data' => $data,
            'servers' => $server,
            'type' => $type,
            'team' => $team,
            'server_type' => Server::IsRealmByType($server)
        ]);
    }

    public function calculator () {
        Meta::prependTitle('Таланты')
            ->setDescription('Просмотреть все таланты, доступные для классов игровых персонажей World of Warcraft.');
        return view('game.talent-calculator');
    }

    public function status () {
        return view('game.status');
    }

    public function races () {
        Meta::prependTitle(__('races.races_11'))
            ->setDescription(__('races.races_12'));
        return view('game.races', [
            'race' => Races::select(['name', 'images_main', 'images_main_two', 'slug', 'faction'])->get()
        ]);
    }

    public function races_view($race) {
        $races = Races::where('slug', $race)->firstOrFail();
        Meta::prependTitle($races->getTranslatedAttribute('name', App()->getLocale(), 'en-gb'))
            ->setDescription($races->getTranslatedAttribute('description', App()->getLocale(), 'en-gb'), 200);
        return view('game.races_view', [
            'race' => $races,
            'other' => Races::where('slug', '!=', $race)->limit(2)->get()
        ]);
    }

    public function classes_view($classes) {
        $class = Classes::where('slug', $classes)->firstOrFail();
        Meta::prependTitle($class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb'))
            ->setDescription($class->getTranslatedAttribute('description', App()->getLocale(), 'en-gb'), 200);
        return view('game.classes_view', [
            'classes' => $class,
            'other' => Classes::where('slug', '!=', $classes)->limit(2)->get()
        ]);
    }

    public function classes () {
        Meta::prependTitle(__('classes.classes_7'))
            ->setDescription(__('classes.classes_8'));
        $first = Classes::all()->reverse()->take(6);
        $last = Classes::all()->reverse()->skip(6)->take(6);
        $num = 0;
        return view('game.classes', [
            'first' => $first,
            'last' => $last,
            'num' => $num
        ]);
    }

    public function graphql(Request $request) {
        if ($request->get('operationName')) {
            if ($request->get('operationName') === 'GetNow') {
                return Server::status();
            } else {
                if($request->get('variables')['input']['compoundRegionGameVersionSlug'] === 'eu') {
                    return Server::status();
                } elseif ($request->get('variables')['input']['compoundRegionGameVersionSlug'] === 'sl-eu') {
                    return Server::statusSL();
                }  elseif($request->get('variables')['input']['compoundRegionGameVersionSlug'] === 'wotlk-eu') {
                    return Server::statusWotlk();
                }
            }
        } else {
            return json_encode(
                ["errors"=>[["message"=>"PersistedQueryNotSupported"]]]
            );
        }
    }

    public function stream() {
        Meta::prependTitle('Стримы')
            ->setDescription(__('classes.classes_8'));

        $this->addStreamUser();
        $twitch = new Twitch;
        $twitch->setClientId('dg7ctrw8kegwua5bbmp80nwn8u4807');
        $stream = Stream::all();
        foreach ($stream as $item)  {
            $result = $twitch->getUsers(['login' => $item->name]);
            if ( ! $result->success()) {
                return null;
            }
            $user = $result->shift();

            $results = $twitch->getStreams(['user_id' => $user->id]);
            if ( ! $results->success()) {
                return null;
            }

            $users = $results->shift();

            Stream::where('name', $item->name)->update([
                'display_name' => $user->display_name,
                'description' => $user->description,
                'user_id' => $user->id,
                'profile_image_url' => $user->profile_image_url,
                'view_count' => $user->view_count,
                'title' => $users->title ?? '',
                'type' => $users->type ?? 'offline',
            ]);
        }

        $streams = Stream::all();
        return view('game.stream.index', ['stream' => $streams]);
    }

    public function streamView($name) {
        $stream = Stream::where('name', $name)->firstOrFail();
        $twitch = new Twitch;
        $twitch->setClientId('dg7ctrw8kegwua5bbmp80nwn8u4807');
        $result = $twitch->getStreams(['user_id' => $stream->user_id]);
        if ( ! $result->success()) {
            return null;
        }
        $user = $result->shift();
        Meta::prependTitle($user->user_name )
            ->setDescription(__('classes.classes_8'));
        return view('game.stream.view', ['user' => $user]);
    }

    private function addStreamUser()
    {
        $userStream = Streams::where('status', 1)->get();
        foreach ($userStream as $item) {
            if (!Stream::where('name', $item->name_user)->first()) {
                Stream::create([
                    'name' => $item->name_user,
                    'display_name' => $item->name_user,
                    'description' => '',
                    'user_id' => '',
                    'profile_image_url' => '',
                    'view_count' => '',
                    'title' => '',
                    'type' => ''
                ]);
            }
        }
    }
}
