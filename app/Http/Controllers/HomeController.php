<?php

namespace App\Http\Controllers;


use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Home\Website as WebModel;
use App\Models\Home\Posts as PostsModel;
use App\Models\User\User as UserModel;
use App\Models\Home\Contact as ContactModel;
use Illuminate\Support\Facades\Cache;

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

        // 获取客户点IP地址
        $ClientIP = request()->ip();

        $CacheKey = 'like_' . $contactId . '_' . $ClientIP;
        if (Cache::has($CacheKey)) {
            return response()->json(['error' => '您已经点赞过！'], 400);
        }

        // 获取字段值并+1
        $likecount = $contact->like + 1;

        // 更新字段值
        $contact->like = $likecount;

        $contact->save();

        // 将点赞记录写入 Cache，设置过期时间，例如10分钟
        Cache::put($CacheKey, true, now()->addMinutes(999));
        // 返回新的点赞数
        return response()->json(['LikeCount' => $likecount]);

    }


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

        // 获取客户点IP地址
        $clientIP = request()->ip();

        // 使用缓存检查是否已经点赞过,设置唯一缓存值
        $cacheKey = 'like_' . $post_id . '_' . $clientIP;
        if (Cache::has($cacheKey)) {
            return response()->json(['error' => '您已经点赞过！'], 400);
        }

        // 获取文章的"like"字段的值
        $newLikeCount = $posts->like + 1;

        // 更新模型的like字段
        $posts->like = $newLikeCount;

        // 保存更新后的值
        $posts->save();

        // 将点赞记录写入 Cache，设置过期时间，例如10分钟
        Cache::put($cacheKey, true, now()->addMinutes(999));


        // 返回新的点赞数
        // response() 函数是 Laravel 中用于创建响应实例的全局辅助函数。
        return response()->json(['newLikeCount' => $newLikeCount]);
    }


    // 文章浏览量+1
    public function increaseViewCount($PostId)
    {
        $posts = PostsModel::find($PostId);

        $userIp = request()->ip();
        if (!$posts) {
            return response()->json(['error' => '该文章不存在！'], 404);
        }

        // json_decode 解码JSON格式的数据
        if ($posts && !in_array($userIp, json_decode($posts->viewed_ips))) {
            // 如果未浏览过，浏览量加1
            $NewViewCount = $posts->view++;

            // 记录用户的ip，避免重复增加
            $viewIps = json_decode($posts->viewed_ips, true);// 应该加上 true 参数将 JSON 转换为数组
            $viewIps[] = $userIp; // 将用户ip地址添加到数组中
            $posts->viewed_ips = json_encode($viewIps);// 保存到数据库

            $posts->view = $NewViewCount; // 更新浏览次数字段
            $posts->save();

            return response()->json(['success' => true, 'NewViewCount' => $NewViewCount]);
        } else {
            return response()->json(['success' => false, 'message' => '该用户已经浏览过该文章']);
        }

    }
}
