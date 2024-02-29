<?php

namespace App\Http\Controllers;


use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Home\Website as WebModel;
use App\Models\Home\Posts as PostsModel;
use App\Models\User\User as UserModel;
use App\Models\Home\Contact as ContactModel;
use App\Models\Home\Comments as CommentsModel;
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

        // 使用 check_input 过滤用户输入数据
        $name = check_input($request->input('name'));
        $email = check_input($request->input('email'));
        $content = check_input($request->input('content'));

        $params = [
            'name' => $name,
            'email' => $email,
            'content' => $content
        ];

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

        // 查询这篇文章的作者id
        $Authorid = $posts->author_id;

        // dd($Authorid);

        // 查询作者信息
        $AuthorInfo = UserModel::find($Authorid);

        // 查询这篇文章的评论
        $comment = CommentsModel::where('post_id', $id)->limit(5)->get();

        // 返回到文章详情页面，并传递文章信息
        $data = compact([
            'posts',
            'AuthorInfo',
            'comment'
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

        // json_decode 解码JSON格式的数据为数组
        $viewedIps = json_decode($posts->viewed_ips, true) ?? [];

        // json_decode 解码JSON格式的数据
        if ($posts && !in_array($userIp, $viewedIps)) {
            // 如果未浏览过，浏览量加1
            $NewViewCount = $posts->view + 1;

            // 记录用户的ip，避免重复增加
            $viewedIps[] = $userIp; // 将用户ip地址添加到数组中
            $posts->viewed_ips = json_encode($viewedIps); // 保存到数据库

            $posts->view = $NewViewCount; // 更新浏览次数字段
            $posts->save();

            return response()->json(['success' => true, 'NewViewCount' => $NewViewCount]);
        } else {
            return response()->json(['success' => false, 'message' => '该用户已经浏览过该文章']);
        }
    }

    // 文章发表评论
    public function PostComment(Request $request, $PostID)
    {
        // 检查用户是否已登录  先查 先查 先查

        $LoginUser = !empty($request->cookie('LoginUser')) ? json_decode($request->cookie('LoginUser'), true) : [];
        //  获取用户评论的内容
        $commentText = $request->input('comment');
        // dd($params);
        if (empty($LoginUser)) {
            // dd('用户未登录，将执行重定向');
            return response()->json(['error' => '请先登录！'], 400);
        }
        // 用户名
        $Username = !empty($LoginUser['name']) ? $LoginUser['name'] : 0;
        // 用户头像 使用的时候前面要加 uploads/
        $UserAvatar = !empty($LoginUser['avatar']) ? $LoginUser['avatar'] : '';

        $UserId = !empty($LoginUser['id']) ? $LoginUser['id'] : 0;
        // dd($LoginUser);

        // 创建新的评论记录
        $comment = new CommentsModel();
        $comment->post_id = check_input($PostID);
        $comment->userid = check_input($UserId);
        $comment->username = check_input($Username);
        $comment->avatar = check_input($UserAvatar);
        $comment->content = check_input($commentText);
        $result = $comment->save();

        if ($result === false) {
            return response()->json(['error' => '评论失败!'], 400);
        } else {
            return response()->json(['success' => '评论成功!'], 200);
        }
    }

    // 加载更多评论
    public function loadMore($PostID)
    {
        $commentCount = CommentsModel::where('post_id', $PostID)->count();
        //查询全部评论,跳过前五条数据，从第六条获取
        $comment = CommentsModel::where('post_id', $PostID)->limit($commentCount)->offset(5)->get();

        return response()->json(['comment' => $comment], 200);
    }
}
