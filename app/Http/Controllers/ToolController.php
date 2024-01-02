<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    // 工具主页
    public function index()
    {
        return view('tool.index');
    }

    // 二维码生成
    public function QRcode()
    {
        return view('tool.QRcode');
    }
}
