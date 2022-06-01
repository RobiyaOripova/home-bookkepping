<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccountingApiController;
use App\Http\Controllers\PassportAuthController;

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
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::middleware('custom.auth:api')->group(function () {
    Route::get("accountings",[AccountingApiController::class,"index"]);
    Route::get("accountings/{accounting}",[AccountingApiController::class,"show"]);
    Route::post("accountings/store",[AccountingApiController::class,"store"]);
    Route::put("change-accounting/{accounting}",[AccountingApiController::class,"update"]);
    Route::delete("accountings/{accounting}",[AccountingApiController::class,"destroy"]);


});


