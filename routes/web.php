<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

// 主页相关路由
Route::prefix('home')->group(function () {
    Route::get('suggest', [HomeController::class, 'suggest']);
});

// 用户相关路由
Route::prefix('user')->group(function () {
    Route::get('login', [UserController::class, 'login']);
    Route::get('register', [UserController::class, 'register']);
    Route::get('profile', [UserController::class, 'profile']);
});
// 处理表单提交路由
Route::prefix('user')->group(function () {
    Route::post('register_form', [UserController::class, 'register_form']);
    Route::post('login_form', [UserController::class, 'login_form']);
    Route::post('profileForm', [UserController::class, 'profileForm']);
    // Route::post('contact/addform', [ContactController::class, 'addform']);
    // Route::post('contact/editform', [ContactController::class, 'editform']);
});
// 后台管理页面
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
