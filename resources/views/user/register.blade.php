{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','注册')

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
                 style="background-image: url('{{ asset('assets/images/backgrounds/偶像练习生背景.jpg') }}');margin-top: 62px">
            <span class="mask bg-primary alpha-6"></span>
            <div class="container d-flex align-items-center no-padding">
                <div class="col">
                    {{--提示框--}}
                    {{--                    <div class="row justify-content-center">--}}
                    {{--                        <div class="col-lg-8 alert-box-success">--}}
                    {{--                            <div class="alert wow fadeInUp alert-success alert-dismissible fade1 show1" role="alert">--}}
                    {{--                                <span class="alert-inner--icon"><i class="fas fa-check"></i></span>--}}
                    {{--                                <span class="alert-inner--text"><strong>注册成功!</strong> 赶快去登录吧!</span>--}}
                    {{--                                <button type="button" class="undo" aria-label="Undo">关闭</button>--}}
                    {{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                    {{--                                    <span aria-hidden="true">&times;</span>--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="row justify-content-center">--}}
                    {{--                        <div class="col-lg-8 alert-box-danger">--}}
                    {{--                            <div class="alert alert-danger alert-dismissible fade1 show1" role="alert">--}}
                    {{--                                <span class="alert-inner--icon"><i class="fas fa-times"></i></span>--}}
                    {{--                                <span class="alert-inner--text"><strong>注册失败</strong> 请修改信息后重试一次吧!</span>--}}
                    {{--                                <button type="button" class="undo" aria-label="Undo">关闭</button>--}}
                    {{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                    {{--                                    <span aria-hidden="true">&times;</span>--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--提示框end--}}

                    {{--注册框--}}
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
                                    <img src="{{URL::asset('assets/images/brand/icon.png')}}" style="width: 50px;"
                                         alt="">
                                    <h4 class="heading h3 text-white pt-3">欢迎加入,<br>
                                        注册您的账户.</h4>

                                    <form class="form-primary wow fadeInUp" data-wow-delay="200ms"
                                          style="margin-top: 3rem"
                                          action="{{url('user/register_form')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name" id="name"
                                                   placeholder="请输入昵称" required/>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" id="email"
                                                   placeholder="请输入邮箱" required/>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   id="password" placeholder="请输入密码"
                                                   required/>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                   class="form-control @error('re_password') is-invalid @enderror"
                                                   name="re_password"
                                                   id="re_password" placeholder="请输入确认密码"
                                                   required/>
                                            @error('re_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group code">
                                            <input type="password"
                                                   class="form-control @error('captcha') is-invalid @enderror"
                                                   name="captcha"
                                                   id="captcha" placeholder="请输入验证码"
                                                   required/>
                                            @error('captcha')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div
                                                style="display:flex;justify-content: space-between;align-items: center;margin-top: 15px">
                                                <div>点击图片刷新</div>
                                                <img id="img" style=" border-radius: 5px"
                                                     src="{{captcha_src()}}" alt="图片验证码">
                                            </div>

                                        </div>

                                        <button type="submit" id="registerButton"
                                                class="btn btn-block btn-lg bg-white mt-4">注册
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--登录框end--}}
                </div>
            </div>
        </section>
    </main>
    {{--  底部导航  --}}
    {{-- @include('common.footer')--}}
@endsection
@push('script')
    <script>
        $(function () {
            var url = $('#img').attr('src');
            $('#img').click(function () {
                $(this).attr('src', url + Math.random())
            })
        })

        {{--document.getElementById('registerButton').addEventListener('click', function (event) {--}}
        {{--    event.preventDefault(); // Prevent the default form submission behavior--}}

        {{--    const name = document.getElementById('name').value;--}}

        {{--    $.ajax({--}}
        {{--        type: 'post',--}}
        {{--        url: '{{ url("user/checked_form") }}',--}}
        {{--        data: {--}}
        {{--            name--}}
        {{--        },--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        },--}}
        {{--        dataType: 'json',--}}
        {{--        success: function (res) {--}}
        {{--            console.log('Ajax response:', res);--}}
        {{--        },--}}
        {{--        error: function () {--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

    </script>
@endpush
