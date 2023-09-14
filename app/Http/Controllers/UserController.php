<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //登录页
    public function login()
    {
        return view('user.login');
    }

    // 处理登录的逻辑
    public function login_form()
    {

    }

    //注册页
    public function register()
    {
        return view('user.register');
    }

    // 处理注册的逻辑
    public function register_form()
    {

    }

    // 个人信息页
    public function profile()
    {
        return view('user.profile');
    }

    // 处理修改资料的逻辑
    public function profileForm(Request $request)
    {

    }
}
