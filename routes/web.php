<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\Forums\IndexController;
use App\Http\Controllers\Forums\RepliesController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RaidController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('shadowlands', [MainController::class, 'promoPage'])->name('promoPage');
Route::get('content-update-notes', [MainController::class, 'update'])->name('content.update');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('news.frag', [NewsController::class, 'frag'])->name('news.frag');

Route::prefix('forums')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('forums.index');
    Route::get('/new', [IndexController::class, 'new'])->name('forums.new');
    Route::get('/latest', [IndexController::class, 'latest'])->name('forums.latest');
    Route::get('/{category}', [IndexController::class, 'show'])->name('forum.show')->where('category', '[0-9]+');
    Route::post('/{category}/create', [IndexController::class, 'store'])->name('forum.topic.store');
    Route::get('/topic/{thread}', [IndexController::class, 'topic'])->name('topic.show');
    Route::post('/replies/{thread}', [RepliesController::class, 'store'])->name('forum.topic.reply.create');
    Route::get('/search', [SearchController::class, 'forum'])->name('forum.search');
});

Route::get('game/stream', [GameController::class, 'stream'])->name('stream');
Route::get('game/stream/{name}', [GameController::class, 'streamView'])->name('stream.view');
Route::get('game/talent-calculator', [GameController::class, 'calculator'])->name('talent.calculator');
Route::get('game/status/{name}', [GameController::class, 'status'])->name('status');
Route::get('game/races', [GameController::class, 'races'])->name('races');
Route::get('game/races/{race}', [GameController::class, 'races_view'])->name('races.view');
Route::get('game/classes', [GameController::class, 'classes'])->name('classes');
Route::get('game/classes/{classes}', [GameController::class, 'classes_view'])->name('classes.view');

Route::get('game/recruit-a-friend', [GameController::class, 'recruit'])->name('recruit');

Route::get('game/pvp/leaderboards/{servers}/{type}', [GameController::class, 'arena'])->name('arena');

Route::get('game/pve/leaderboards/{server}/{instance}', [GameController::class, 'leaderboards'])->name('leaderboards');

Route::get('pages/{id}/{slug}', [PagesController::class, 'view'])->name('pages.view');

Route::get('character', [CharactersController::class, 'index'])->name('characters.index');
Route::get('character/eu/{server}/{characters}', [CharactersController::class, 'show'])->name('characters.show');
Route::get('character/eu/{server}/{characters}/model.json', [CharactersController::class, 'model']);
Route::get('character/eu/{server}/{characters}/achievements', [CharactersController::class, 'achievements'])->name('achievements');
Route::get('character/eu/{server}/{characters}/achievements/model.json', [CharactersController::class, 'achievementsModel']);
Route::get('character/eu/{server}/{characters}/collections/pets.json', [CharactersController::class, 'petsModel']);
Route::get('character/eu/{server}/{characters}/pve/raids.json ', [CharactersController::class, 'raidsModel']);
Route::get('character/eu/{server}/{characters}/pve/raids', [CharactersController::class, 'raids']);
Route::get('character/eu/{server}/{characters}/pvp', [CharactersController::class, 'pvp'])->name('pvp');
Route::get('character/eu/{server}/{characters}/pvp.json', [CharactersController::class, 'pvpModel']);
Route::get('character/eu/{server}/{characters}/reputation.json', [CharactersController::class, 'reputationModel']);
Route::get('character/eu/{server}/{characters}/reputation', [CharactersController::class, 'reputation'])->name('reputation');

Route::get('character/eu/{server}/{characters}/pve/raids/{key}/{ids}/details.frag', [RaidController::class, 'index'])->name('raid.details');

Route::get('guild/eu/{server}/{guild_name}', [GuildController::class, 'show'])->name('guild.show');

Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('search/character', [SearchController::class, 'character'])->name('search.character');
Route::get('search/blog', [SearchController::class, 'blog'])->name('search.blog');

Route::get('online', [OnlineController::class, 'index'])->name('online.index');

Route::get('/referral-link', [MainController::class, 'referral']);

Route::group(['prefix' => 'admin'], function () {
    (new TCG\Voyager\Voyager)->routes();

    Route::get('clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return "Кэш очищен.";
    });
});
