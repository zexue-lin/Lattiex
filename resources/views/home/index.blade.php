{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','翻斗花园')

{{--页面独立的css文件--}}
@push('css')

@endpush

@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    {{--  主体内容  --}}
    <main class="main">
        {{--    第一部分，背景图    --}}
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
        {{--    第二部分，三个card    --}}
        <section class="slice slice-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="heading heading-5 strong-600">Special title treatment</h5>
                                <h6 class="heading heading-sm strong-400 text-muted mb-4">
                                    2 hrs ago
                                </h6>
                                <p class="card-text">With supporting text below...</p>
                                <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="avatar avatar-sm bg-purple">JD</span>
                                        <span class="avatar-content">David Wally</span>
                                    </div>
                                    <div class="col text-right text-xs-right">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-2">
                                                <a href="#"><i class="fas fa-heart mr-1"></i> 50</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fas fa-eye text-muted mr-1"></i> 750
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="heading heading-5 strong-600">Special title treatment</h5>
                                <h6 class="heading heading-sm strong-400 text-muted mb-4">
                                    2 hrs ago
                                </h6>
                                <p class="card-text">With supporting text below...</p>
                                <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="avatar avatar-sm bg-purple">JD</span>
                                        <span class="avatar-content">David Wally</span>
                                    </div>
                                    <div class="col text-right text-xs-right">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-2">
                                                <a href="#"><i class="fas fa-heart mr-1"></i> 50</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="fas fa-eye text-muted mr-1"></i> 750
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="heading heading-5 strong-600">Special title treatment</h5>
                                <h6 class="heading heading-sm strong-400 text-muted mb-4">
                                    2 hrs ago
                                </h6>
                                <p class="card-text">With supporting text below...</p>
                                <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="avatar avatar-sm bg-purple">JD</span>
                                        <span class="avatar-content">David Wally</span>
                                    </div>
                                    <div class="col text-right text-xs-right">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item pr-2">
                                                2 hrs ago
                                            </li>
                                        </ul>
                                    </div>
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
