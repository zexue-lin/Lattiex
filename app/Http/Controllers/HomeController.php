<?php

namespace App\Http\Controllers;

use App\Models\Home\Contact;
use Illuminate\Http\Request;
use App\Models\Home\Website as WebModel;
use App\Models\Home\Posts as PostsModel;
use App\Models\User\User as UserModel;

class HomeController extends Controller
{
    // 主页
    public function index()
    {
        // 使用 PostModel 查询数据库中的所有数据
        $postsIndex = PostsModel::all();

        $data = compact([
            'postsIndex'
        ]);
        // 将数据传递给视图
        return view('home.index', $data);
    }

    // 留言界面
    public function contact()
    {
        return view('contact');
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
        return view('website', $data);
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

    // 文章详情页面
    public function posts($id)
    {
        // 根据文章ID加载文章内容
        $posts = PostsModel::find($id);

        // 查询这篇文章的用户id
        $Authorid = $posts->author_id;

        // 查询用户信息
        $AuthorInfo = UserModel::find($Authorid);


        // 返回到文章详情页面，并传递文章信息

        $data = compact([
            'posts',
            'AuthorInfo',
        ]);
        // dd($data);

        // 将查询结果传递给视图
        return view('posts', $data);

    }

}
