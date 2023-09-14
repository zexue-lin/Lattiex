<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 主页
    public function index()
    {
        return view('home.index');
    }

    // 留言界面
    public function suggest()
    {
        return view('home.suggest');
    }
}
