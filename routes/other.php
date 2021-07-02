<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\FreeKassaController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

if (App::environment('production')) {
    URL::forceScheme('https');
}
Route::get('{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

require __DIR__.'/auth.php';

Route::get('/cookie', function () {
    return Cookie::get('referral');
});

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

Route::group(['prefix' => 'forums'], function () {
    Route::post('topic/post/{user}/block', [JsonController::class, 'block']);
    Route::post('topic/post/{thread}/report', [JsonController::class, 'report']);
    Route::get('topic/post/{topic}/frag', [JsonController::class, 'frag']);
    Route::post('topic/post/{topic}/edit', [JsonController::class, 'edit']);
    Route::post('topic/post/{topic}/up', [JsonController::class, 'up']);
    Route::post('topic/post/{topic}/down', [JsonController::class, 'down']);
    Route::post('topic/post/{topic}/delete', [JsonController::class, 'delete']);
    Route::post('topic/post/{topic}/closed', [JsonController::class, 'closed']);
    Route::post('topic/post/{topic}/unclosed', [JsonController::class, 'unclosed']);
    Route::post('topic/post/{topic}/sticky', [JsonController::class, 'sticky']);
    Route::post('topic/post/{topic}/unsticky', [JsonController::class, 'unsticky']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('{any}', AccountController::class)
        ->where('any', '.*')
        ->middleware('auth')
        ->name('user');
});

Route::post('graphql', [GameController::class, 'graphql'])->name('graphql');
Route::get('navbar/notifications.json', [JsonController::class, 'notifications'])->name('json.notifications');
Route::get('support/update/json', [JsonController::class, 'update'])->name('json.update');

Route::get('freekassa/result', [FreeKassaController::class, 'searchOrder']);
