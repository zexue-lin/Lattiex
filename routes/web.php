<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
// 首页页面
Route::get('/', [HomeController::class, 'index']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
