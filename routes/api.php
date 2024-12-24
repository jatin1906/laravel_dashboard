<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\UserController;
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

Route::post('getUser', [UserController::class, 'login']);
Route::middleware(['api', 'api.log'])->group(function () {
    Route::post('getallUser', [UserController::class, 'getallUser']);

    Route::post('add-user', [UserController::class, 'addUser']);
});
