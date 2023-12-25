{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','登录')

{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/home.css')}}">
@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    {{-- 主要内容 --}}
    <main class="main">
        <section class="py-xl bg-cover bg-size--cover"
                 style="background-image: url('{{ asset('assets/images/backgrounds/偶像练习生背景.jpg') }}')">
            <span class="mask bg-primary alpha-6"></span>
            <div class="container d-flex align-items-center no-padding">
                <div class="col">
                    @if (session('success'))
                        {{--提示框--}}
                        <div class="row justify-content-center">
                            <div class="col-lg-8 alert-box-success">
                                <div
                                    class="alert wow fadeInUp alert-success alert-dismissible fade1 show1"
                                    role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-check"></i></span>
                                    <span class="alert-inner--text"><strong>注册成功 </strong> 赶快去登录吧!</span>
                                    <button type="button" class="undo" aria-label="Undo">关闭
                                    </button>
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        {{--提示框--}}
                        <div class="row justify-content-center">
                            <div class="col-lg-8 alert-box-success">
                                <div
                                    class="alert wow fadeInUp alert-danger alert-dismissible fade1 show1"
                                    role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-times"></i></span>
                                    <span class="alert-inner--text"><strong>登录失败 </strong> 该邮箱未注册!</span>
                                    <button type="button" class="undo" aria-label="Undo">关闭
                                    </button>
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('errorPsw'))
                        {{--提示框--}}
                        <div class="row justify-content-center">
                            <div class="col-lg-8 alert-box-success">
                                <div
                                    class="alert wow fadeInUp alert-danger alert-dismissible fade1 show1"
                                    role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-times"></i></span>
                                    <span class="alert-inner--text"><strong>登录失败 </strong> 密码错误!</span>
                                    <button type="button" class="undo" aria-label="Undo">关闭
                                    </button>
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('msg'))
                        {{--提示框--}}
                        <div class="row justify-content-center">
                            <div class="col-lg-8 alert-box-success">
                                <div
                                    class="alert wow fadeInUp alert-warning alert-dismissible fade1 show1"
                                    role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-exclamation"></i></span>
                                    <span class="alert-inner--text"><strong>请先登录 </strong> 登录后即可访问!</span>
                                    <button type="button" class="undo" aria-label="Undo">关闭
                                    </button>
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body wow fadeInUp " data-wow-delay="200ms">
                                    <a href="javascript:void(0);" onclick="history.back();">
                                        <button type="button" class="btn btn-primary btn-nobg btn-zoom--hover mb-5">
                                            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                                        </button>
                                    </a>
                                    <span class="clearfix"></span>
                                    <img src="../assets/images/brand/icon.png" style="width: 50px;" alt="">
                                    <h4 class="heading h3 text-white pt-3 pb-5">欢迎回来,<br>
                                        登录到您的账户.</h4>
                                    <form class="login wow fadeInUp form-primary" data-wow-delay="200ms"
                                          action="{{url('user/login_form')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="邮箱地址" value="{{ old('email') }}" required>

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="密码" required>
                                        </div>

                                        <div class="login-register">
                                            <div>还没有账号，<a href="{{url('user/register')}}"
                                                               class="text-white">去<u>注册</u></a>
                                            </div>
                                            <div><a href="#" class="text-white">忘记密码?</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-lg bg-white mt-4">登录
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{--  底部导航  --}}
    {{--    @include('common.footer')--}}
@endsection
