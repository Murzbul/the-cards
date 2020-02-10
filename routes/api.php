<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login', 'AuthHandler@login')->name('AuthHandler@login');
Route::post('/signup', 'AuthHandler@signUp')->name('AuthHandler@signUp');

Route::middleware(\App\Http\Kernel::API)->group(function(){
    Route::post('/games', 'GameHandler@create')->name('GameHandler@create');
    Route::get('/games', 'GameHandler@show')->name('GameHandler@show');
    Route::get('/games/status/{playerId}', 'GameHandler@statusPlayer')->name('GameHandler@statusPlayer');
    Route::get('/games/next', 'GameHandler@next')->name('GameHandler@next');
    Route::get('/players/cards', 'GameHandler@getPlayerCards')->name('GameHandler@getPlayerCards');
    Route::post('/games/cards/{entityId}', 'GameHandler@useCard')->name('GameHandler@useCard');

    Route::post('/files/upload', 'FileHandler@upload')->name('FileHandler@upload');

    Route::post('/roles', 'RoleHandler@create')->name('RoleHandler@create');
    Route::put('/roles/{roleId}', 'RoleHandler@update')->name('RoleHandler@update');
    Route::get('/roles', 'RoleHandler@list')->name('RoleHandler@list');
    Route::get('/roles/{roleId}', 'RoleHandler@show')->name('RoleHandler@show');

    Route::get('/logout', 'AuthHandler@logout')->name('AuthHandler@logout');
    Route::get('/refresh', 'AuthHandler@refresh')->name('AuthHandler@refresh');
    Route::get('/me', 'AuthHandler@me')->name('AuthHandler@me');
});
