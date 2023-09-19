<?php

namespace App\Http\Controllers;

use App\Models\Home\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 主页
    public function index()
    {
        return view('home.index');
    }

    // 留言界面
    public function contact()
    {
        return view('home.contact');
    }

    // 处理留言提交
    public function contact_form(Request $request)
    {
        $params = $request->all();

        $result = Contact::create($params);

        if ($result) {
            // 留言成功
            return redirect('home/contact')->with('success', '留言成功！');
        } else {
            // 留言失败
            return redirect('home/contact')->with('error', '留言失败！');
        }

    }
}
