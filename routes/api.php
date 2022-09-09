<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChannelController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index']);
});

Route::group(['prefix' => 'channels'], function () {
    Route::get('/', [ChannelController::class, 'index']);
    Route::get('/ranking', [ChannelController::class, 'getRankingByMinutesWatched']);
});