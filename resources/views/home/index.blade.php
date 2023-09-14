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
        {{--    第二部分    --}}
        <section class="slice slice-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <!-- Typography部分 -->
                        <div class="row align-items-center mb-5">
                            <div class="col-8">
                                <h2 class="heading h3 mb-0">排版</h2>
                            </div>
                            <div class="col-4 text-right">
                                <a href="docs/typography.html" class="btn btn-sm btn-primary">文档中打开</a>
                            </div>
                        </div>
                        <div class="row typeface-palette cols-xs-space cols-sm-space cols-md-space">
                            <div class="col-sm-4">
                                <a>
                                    <div class="typeface-entry">
                                    <span
                                        class="badge badge-md typeface-badge badge-pill bg-primary text-white">常规</span>
                                        <h3 class="heading display-3 font-weight-20 text-dark">
                                            这是一
                                        </h3>
                                        <p>
                                            Mist enveloped the ship three hours out from port.
                                        </p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        >
    </main>

    {{--  底部导航  --}}
    @include('common.footer')
@endsection
