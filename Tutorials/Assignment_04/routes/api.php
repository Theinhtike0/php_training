<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PlayerController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('player', [ApiController::class, 'getPlayer']);

Route::get('player/{id}', [ApiController::class, 'getPlayerById']);

Route::post('addPlayer', [ApiController::class, 'addPlayer']);

Route::put('updatePlayer/{id}', [ApiController::class, 'updatePlayer']);

Route::delete('deletePlayer/{id}', [ApiController::class, 'deletePlayer']);
