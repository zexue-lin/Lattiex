<?php

namespace App\Http\Controllers;


use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Home\Website as WebModel;
use App\Models\Home\Posts as PostsModel;
use App\Models\User\User as UserModel;
use App\Models\Home\Contact as ContactModel;

class HomeController extends Controller
{
    // 主页
    public function index()
    {
        // 使用 PostModel 查询数据库中的所有数据，并按照创建时间倒序排序
        $postsIndex = PostsModel::orderBy('created_at', 'desc')->get();

        $data = compact([
            'postsIndex'
        ]);
        // 将数据传递给视图
        return view('home.index', $data);
    }

    // 留言界面
    public function contact()
    {
        // 留言总数
        $count = ContactModel::count();
        // 查询每个留言的内容，用于展示
        $message = ContactModel::orderBy('created_at', 'desc')->paginate(3); // 每页显示3条留言
        $data = compact([
            'count',
            'message'
        ]);
        return view('contact', $data);
    }


    // 处理留言提交
    public
    function contact_form(Request $request)
    {
        $params = $request->all();

        $result = ContactModel::create($params);

        if ($result) {
            // 留言成功
            return redirect('/contact')->with('success', '留言成功！');
        } else {
            // 留言失败
            return redirect('/contact')->with('error', '留言失败！');
        }

    }


    public function contact_like($contactId)
    {
        // 执行点赞逻辑，这里你需要更新数据库中的点赞数
        $contact = ContactModel::find($contactId);

        if (!$contact) {
            return response()->json(['error' => '该留言不存在'], 404);
        }
        // 获取字段值并+1
        $likecount = $contact->like + 1;

        // 更新字段值
        $contact->like = $likecount;

        $contact->save();
        // 返回新的点赞数
        return response()->json(['LikeCount' => $likecount]);

    }

    // 留言界面
    public
    function website()
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


    // 文章详情页面
    public
    function posts($id)
    {
        // 根据文章ID加载文章内容
        $posts = PostsModel::find($id);

        // 查询这篇文章的用户id
        $Authorid = $posts->author_id;

        // dd($Authorid);

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

    // 文章内容点赞请求
    public function like_request($post_id)
    {
        // 根据文章ID加载文章内容
        $posts = PostsModel::find($post_id);

        if (!$posts) {
            return response()->json(['error' => '该文章不存在！'], 404);
        }

        // 获取文章的"like"字段的值
        $newLikeCount = $posts->like + 1;

        // 更新模型的like字段
        $posts->like = $newLikeCount;

        // 保存更新后的值
        $posts->save();

        // 返回新的点赞数
        // response() 函数是 Laravel 中用于创建响应实例的全局辅助函数。
        return response()->json(['newLikeCount' => $newLikeCount]);
    }


}
