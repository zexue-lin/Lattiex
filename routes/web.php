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
});

/**
 * Ajax请求的路由 home
 */
Route::prefix('home')->group(function () {
    Route::get('like_request/{postId}', [HomeController::class, 'like_request']);
    Route::post('contact_like/{contactId}', [HomeController::class, 'contact_like']);
    Route::get('increaseViewCount/{PostId}', [HomeController::class, 'increaseViewCount']);
    Route::post('PostComment/{PostID}', [HomeController::class, 'PostComment']);
});


// 用户视图相关路由
Route::prefix('user')->group(function () {
    Route::get('login', [UserController::class, 'login']);
    Route::get('register', [UserController::class, 'register']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::POST('logout', [UserController::class, 'logout']);
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
 * Ajax请求路由 User
 */
Route::prefix('user')->group(function () {
    Route::post('area', [UserController::class, 'area']);
});

// 后台管理页面
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
