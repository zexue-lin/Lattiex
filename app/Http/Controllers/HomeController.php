<?php

namespace App\Http\Controllers;

use App\Models\Home\Contact;
use Illuminate\Http\Request;
use App\Models\Home\Website as WebModel;
use App\Models\Home\Posts as PostsModel;

class HomeController extends Controller
{
    // 主页
    public function index()
    {
        // 使用 PostModel 查询数据库中的所有数据
        $posts = PostsModel::all();

        $data = compact([
            'posts'
        ]);
        // 将数据传递给视图
        return view('home.index', $data);
    }

    // 留言界面
    public function contact()
    {
        return view('home.contact');
    }

    // 留言界面
    public function website()
    {
        // 使用 WebModel 模型查询网站类型为1的所有数据
        $websites1 = WebModel::where('category', 1)->get();

        // 使用 WebModel 模型查询网站类型为1的所有数据
        $websites2 = WebModel::where('category', 2)->get();

        $data = compact([
            'websites1',
            'websites2'
        ]);

        // 将查询结果传递给视图
        return view('home.website', $data);
    }


    // 处理留言提交
    public
    function contact_form(Request $request)
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
