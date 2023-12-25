<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;


class LoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // 用户Cookie
        $LoginUser = Cookie::get('LoginUser') ? json_decode(Cookie::get('LoginUser'), true) : [];

        if (empty($LoginUser)) {
            // return redirect()->route('user/login', ['msg' => '请先登录']);
            // return redirect()->route('user/login')->with('msg', '请先登录');
            return redirect('user/login')->with(['msg' => '请先登录！']);
        }

        $Userid = !empty($LoginUser['id']) ? $LoginUser['id'] : 0;

        // 查询用户表里是否有该用户
        $User = DB::table('user')->find($Userid);

        if (!$User) {
            Cookie::queue(Cookie::forget('LoginUser'));
            return redirect()->route('user/login', ['msg' => '非法登录']);
        }
        return $next($request);
    }
}
