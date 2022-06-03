<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AccountingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.welcomeAcc');
});
Route::get("home",function(){
    return view("auth.accounting");
});
Route::get("login",[UserAuthController::class,"login"]);
Route::get("register",[UserAuthController::class,"register"]);
Route::post("create",[UserAuthController::class,"create"])->name("auth.create");
Route::post("check",[UserAuthController::class,"authenticate"])->name("auth.check");
Route::get("logout",[UserAuthController::class,"logout"]);
//Accounting
Route::get("accountings",[AccountingController::class,"index"])->name('table-show');
Route::get("accountings/list",[AccountingController::class,"anydata"])->name('datatables.data');
Route::get("accountings/create",[AccountingController::class,"create"])->name("table-create");
Route::post("accountings",[AccountingController::class,"store"])->name("table-store");
Route::get("accountings/{accounting}/edit",[AccountingController::class,"edit"])->name("table-edit");
Route::put("accountings/{accounting}",[AccountingController::class,"update"])->name("table-update");
Route::get("accountings/{accounting}",[AccountingController::class,"destroy"])->name("table-delete");


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
