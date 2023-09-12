{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','翻斗花园')

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/demo.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet">
@endpush

@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    <main class="main">
        <section class="spotlight parallax bg-cover bg-size--cover" data-spotlight="fullscreen"
                 style="background-image:  url('{{ asset('assets/images/backgrounds/img-1.jpg') }}')">
            <span class="mask bg-primary alpha-7"></span>
            <div class="spotlight-holder py-lg pt-lg-xl">
                <div class="container d-flex align-items-center no-padding">
                    <div class="col">
                        <div
                            class="row cols-xs-space align-items-center text-center text-md-left justify-content-center">
                            <div class="col-7">
                                <div class="text-center mt-5">
                                    <img src="{{URL::asset('assets/images/brand/icon.png')}}" style="width: 200px;"
                                         class="img-fluid animated" data-animation-in="jackInTheBox"
                                         data-animation-delay="1000" alt="">
                                    <h2 class="heading display-4 font-weight-400 text-white mt-5 animated"
                                        data-animation-in="fadeInUp" data-animation-delay="2000">
                                        <span class="font-weight-700">翻斗花园</span>
                                    </h2>
                                    <p class="lead text-white mt-3 lh-180 c-white animated" data-animation-in="fadeInUp"
                                       data-animation-delay="2500">
                                        最烦打王者的时候不看小地图-一堆nz队友，打游戏不带脑子就去打匹配，别在排位ex人
                                        <strong class="text-white">就知道狗叫</strong>
                                    </p>
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
