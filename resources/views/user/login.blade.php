{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','翻斗花园')

{{--页面独立的css文件--}}
@push('css')

@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')
    <main class="main">
        <section class="py-xl bg-cover bg-size--cover"
                 style="background-image: url('{{ asset('assets/images/backgrounds/img-1.jpg') }}')">
            <span class="mask bg-primary alpha-6"></span>
            <div class="container d-flex align-items-center no-padding">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <a href="{{url('/')}}">
                                        <button type="button" class="btn btn-primary btn-nobg btn-zoom--hover mb-5">
                                            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                                        </button>
                                    </a>
                                    <span class="clearfix"></span>
                                    <img src="../assets/images/brand/icon.png" style="width: 50px;" alt="">
                                    <h4 class="heading h3 text-white pt-3 pb-5">欢迎回来,<br>
                                        登录到您的账户.</h4>
                                    <form class="form-primary">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="input_email"
                                                   placeholder="邮箱地址">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="input_password"
                                                   placeholder="密码">
                                        </div>
                                        <div class="text-right mt-4"><a href="#" class="text-white">忘记密码?</a>
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
    @include('common.footer')
@endsection
