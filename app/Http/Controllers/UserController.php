<?php

namespace App\Http\Controllers;

use App\Models\User\User as UserModel;
use App\Models\User\Region as RegionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //登录页
    public function login()
    {
        return view('user.login');
    }

    // 处理登录的逻辑
    public function login_form(Request $request)
    {
        $params = $request->all();

        $User = UserModel::where(['email' => $params['email']])->first();

        if (!$User) {
            return redirect('user/login')->with('error', '该邮箱未注册，清注册后登录')->withInput();
        }

        $password = md5($params['password'] . $User->salt);


        if ($password != $User['password']) {
            return redirect('user/login')->with('errorPsw', '密码错误')->withInput();
        }

        // 封装cookie数据
        $data = [
            'id' => $User['id'],
            'name' => $User['name'],
            'email' => $User['email'],
            'phone' => $User['phone'],
            'year' => $User['year'],
            'month' => $User['month'],
            'date' => $User['date'],
            'avatar' => $User['avatar'],
            'sex' => $User['sex'],
            'province' => $User['province'],
            'city' => $User['city'],
            'district' => $User['district'],
            'created_at' => $User['created_at'],
        ];

        // 把数组转成json数据格式，目前的cookie是json格式，使用的时候要用json_decode解码
        $UserJson = json_encode($data);

        // 设置cookie
        Cookie::queue('LoginUser', $UserJson);

        // 共享数据给所有视图
        View::share('LoginUser', $data);
        // dd($UserJson);
        // 登录成功
        return redirect('/')->with(['LoginUser' => $data, 'success' => '登录成功！']);

    }

    //注册页
    public function register()
    {
        return view('user.register');
    }

    // 处理注册的逻辑
    public function register_form(Request $request)
    {

        $params = $request->all();

        $params['salt'] = build_ranstr();

        // 表单验证规则
        $rules = [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            're_password' => 'required|same:password',
            'salt' => 'required',
            'captcha' => 'required|captcha'
        ];

        // 错误信息
        $message = [
            'name.required' => '昵称必填',
            'name.unique' => '改昵称已被使用，换一个吧',
            'email.required' => '邮箱必填',
            'email.unique' => '该邮箱已注册，请重新输入',
            'email.email' => '邮箱格式不对',
            'password.required' => '密码必填',
            're_password.required' => '密码必填',
            'salt.required' => '密码盐未知',
            're_password.same' => '确认密码和密码不匹配!',
            'captcha.captcha' => '验证码不匹配'
        ];

        $validator = Validator::make($params, $rules, $message);

        if ($validator->fails()) {
            return redirect('user/register')->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => md5($params['password'] . $params['salt']),
            'salt' => $params['salt'],
            'role_id' => 2,  // 默认的 role_id
            'settings' => '{"locale":"zh_CN"}'
        ];

        $result = UserModel::create($data);

        if ($result) {
            // 注册成功
            return redirect('user/login')->with('success', '注册成功！');
        } else {
            // 注册失败
            return redirect('user/register')->with('error', '注册失败！');
        }

    }


    // 个人信息页
    public function profile(Request $request)
    {
        // get cookie
        $LoginUser = $request->cookie('LoginUser') ? json_decode($request->cookie('LoginUser'), true) : [];

        // 查询省份的全部数据
        $province = RegionModel::where(['grade' => 1])->select('code', 'name')->get();
        // dd($province);
        // 查询市
        if ($LoginUser) {
            $city = RegionModel::where(['parentid' => $LoginUser['province']])->select('code', 'name')->get();
        } else {
            $city = [];
        }
        // 查询区
        if ($LoginUser) {
            $district = RegionModel::where(['parentid' => $LoginUser['city']])->select('code', 'name')->get();
        } else {
            $district = [];
        }

        $data = compact([
            'LoginUser',
            'province',
            'city',
            'district'
        ]);
        return view('user.profile', $data);
    }

    // 查询城市，地区
    protected function area()
    {
        // 全局辅助函数rrequest，用于获取当前HTTP请求实例，这里用来获取请求的code值
        $code = request('code');

        $region = RegionModel::where(['parentid' => $code])->select('code', 'name')->get();

        if (!$region) {
            // 直接使用php的json_encode将关联数组转换为json字符串，相对简单
            return json_encode(['code' => 0, 'error' => '所选地区不存在，请重新选择']);

        }
        // 使用laravel提供的response函数创建一个JSON响应对象，更加灵活，允许你设置响应的各种属性，如 HTTP 状态码、
        // response()->json 会自动设置 Content-Type 头部为 application/json。
        // 这里设置了成功的状态码是222，默认是200
        return response()->json(['code' => 1, 'success' => '查询成功', 'data' => $region]);
    }

    // 处理修改资料的逻辑
    public function profileForm(Request $request)
    {
        $LoginUser = $request->cookie('LoginUser') ? json_decode($request->cookie('LoginUser'), true) : [];

        $Userid = !empty($LoginUser['id']) ? $LoginUser['id'] : 0;

        $User = UserModel::find($Userid);

        if (!$LoginUser) {
            // 用户未登录
            return redirect('user/profile')->with(['error' => '用户未登录！']);
            // return response()->json(['code' => 0, 'error' => '用户未登录'], 404);
        }

        // 接受全部参数
        $params = $request->all();

        // 封装更新数据的数组
        $data = [
            'id' => check_input($Userid),
            'name' => check_input($params['name']),
            'email' => check_input($params['email']),
            'phone' => check_input($params['phone']),
            'year' => check_input($params['year']),
            'month' => check_input($params['month']),
            'date' => check_input($params['date']),
            'sex' => check_input($params['sex']),
            'province' => check_input($params['province']),
            'city' => check_input($params['city']),
            'district' => check_input($params['district']),

        ];


        // 修改密码
        if (!empty($params['password'])) {
            // 新的密码盐
            $salt = build_ranstr();

            // 加密
            $password = md5($params['password'] . $salt);

            $data['password'] = $password;
            $data['salt'] = $salt;
        }

        // 修改头像
        // 检查是否有头像文件上传
        if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
            // $file -> 接收到上传文件的字段名,,store->保存文件，第一个参数是指定的路径，第二个参数是指定的磁盘
            $file = $request->file('avatar')->store('users/avatars', 'uploads');

            // 追加到data数组
            $data['avatar'] = $file;
        }

        // 更新到数据库
        $result = UserModel::where(['id' => $Userid])->update($data);

        // 判断修改结果
        if ($result === false) {
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                //上传失败要从磁盘里面删掉
                Storage::disk('uploads')->delete($file);
            }
            return json_encode(['code' => 0, 'msg' => '修改失败']);
        } else {
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                //修改成功，删除旧的头像，防止占空间
                Storage::disk('uploads')->delete($User->avatar);
            }

            $user = UserModel::find($Userid);
            // 封装cookie数据
            $data = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'year' =>$user['year'],
                'month'=>$user['month'],
                'date'=>$user['date'],
                'avatar' => $user['avatar'],
                'sex' => $user['sex'],
                'province' => $user['province'],
                'city' => $user['city'],
                'district' => $user['district'],
                'created_at' => $user['created_at'],
            ];

            // 把数组转成json数据格式，目前的cookie是json格式，使用的时候要用json_decode解码
            $UserJson = json_encode($data);

            // 设置cookie
            Cookie::queue('LoginUser', $UserJson);

            // 共享数据给所有视图
            View::share('LoginUser', $data);
            // 登录成功
            return redirect('user/profile')->with(['LoginUser' => $data, 'success' => '登录成功！']);
        }

    }

    // 退出登录
    public function logout()
    {
        Cookie::queue(Cookie::forget('LoginUser'));
        return json_encode(['code' => 1, 'msg' => '退出登录成功']);

    }
}
