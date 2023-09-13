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
}
