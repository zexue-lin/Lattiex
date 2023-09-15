<?php

namespace App\Http\Controllers;

use App\Models\User\User as UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

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
            return redirect('user/login');
        }

        $password = md5($params['password'] . $User->salt);


        if ($password != $User['password']) {
            return redirect('user/login');
        }

        // 封装cookie数据
        $data = [
            'id' => $User['id'],
            'name' => $User['name'],
            'email' => $User['email'],
            'phone' => $User['phone'],
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

        // 登录成功
        return redirect('/');
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
            'salt' => 'required'
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
            return response()->json(['message' => '注册成功'], 200);
        } else {
            // 注册失败
            return response()->json(['message' => '注册失败'], 400);
        }

    }

    // 检查注册name
    public function checked_name(Request $request)
    {

        $name = $request->input('name');
        // 查询用户表是否存在该用户
        $name = UserModel::find($name);

        //
        if ($name) {
            return json_encode(['code' => 1, 'url' => '注册成功']);
        } else {
            return json_encode(['code' => 0, 'url' => '注册失败']);
        }


    }

    // 个人信息页
    public function profile()
    {
        return view('user.profile');
    }

    // 处理修改资料的逻辑
    public function profileForm(Request $request)
    {

    }
}
