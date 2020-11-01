<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account_infoController;


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

Route::get('account', [Account_infoController::class, 'index']);
//Route::get('user/{id}', 'Account_infoController.show');
Route::post('account', [Account_infoController::class, 'store']);
Route::put('account/{id}', [Account_infoController::class, 'update']);
Route::delete('account/{id}', [Account_infoController::class, 'destroy']);

