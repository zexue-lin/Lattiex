{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','注册')

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
                 style="background-image: url('{{ asset('assets/images/backgrounds/img-1.jpg') }}')">
            <span class="mask bg-primary alpha-6"></span>
            <div class="container d-flex align-items-center no-padding">
                <div class="col">
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


                                    <form class="form-primary wow fadeInUp" data-wow-delay="200ms"
                                          style="margin-top: 3rem"
                                          action="{{url('user/register_form')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="input_email"
                                                   placeholder="有效邮箱地址">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password"
                                                   name="password"
                                                   placeholder="密码">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="re-password"
                                                   name="re-password"
                                                   placeholder="确认密码">
                                        </div>

                                        {{--                                        <div class="login-register">--}}
                                        {{--                                            <div>还没有账号，<a href="#" class="text-white">去注册</a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div><a href="#" class="text-white">忘记密码?</a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <button type="submit" class="btn btn-block btn-lg bg-white mt-4">注册
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
    @include('common.footer')
@endsection
