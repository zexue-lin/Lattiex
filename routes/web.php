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

// 带着文章id跳转
Route::get('posts/{id}', [HomeController::class, 'posts']);

Route::get('website', [HomeController::class, 'website']);

Route::get('contact', [HomeController::class, 'contact']);


// home相关路由
// Route::prefix('home')->group(function () {
//     // Route::get('posts/{id}', [HomeController::class, 'posts']);
//
// });

// 处理home相关表单提交路由
Route::prefix('home')->group(function () {
    Route::post('contact_form', [HomeController::class, 'contact_form']);
    Route::get('like_request/{post_id}', [HomeController::class, 'like_request']);
});

// 用户相关路由
Route::prefix('user')->group(function () {
    Route::get('login', [UserController::class, 'login']);
    Route::get('register', [UserController::class, 'register']);
    Route::get('profile', [UserController::class, 'profile']);
});
// 处理user相关表单提交路由
Route::prefix('user')->group(function () {
    Route::post('register_form', [UserController::class, 'register_form']);
    Route::post('login_form', [UserController::class, 'login_form']);
    Route::post('profileForm', [UserController::class, 'profileForm']);
    // Route::post('contact/addform', [ContactController::class, 'addform']);
    // Route::post('contact/editform', [ContactController::class, 'editform']);
});


/**
 * Ajax请求的路由
 */

// 后台管理页面
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
