{{-- 首页页面 子视图 --}}
@extends('layouts.home')

@section('title', '翻斗花园')

{{-- 页面独立的css文件 --}}
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/home.css') }}">
@endpush

@section('content')
    {{-- 引用顶部导航  --}}
    @include('common.navbar')

    {{-- 主体内容  --}}
    <main class="main">

        {{-- 引用侧边可滚动导航栏 --}}
        {{-- @include('common.scrollbar') --}}

        <section style="padding-top: 3rem">
            <div class="content-inner content-docs">
                <div class="pt-3 pb-4 mb-4 border-bottom indexTop">
                    {{-- 一共12份，分成了6+1+5 两份 --}}
                    <div class="row">
                        <div class="col-lg-3">
                            <h2 class="heading h2 font-weight-bold"></h2>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="heading h2 font-weight-bold"
                                style="text-align: center;padding-top: 14rem;padding-bottom:2rem;">
                                欢迎来翻斗大街翻斗花园！</h2>
                            <form class="post_area">
                                <div class="form-group">
                                    <textarea class="form-control textarea-autosize" placeholder="只因你太美，Oh，baby..." rows="1"></textarea>
                                </div>
                                <label for="file-1" id="avatarbox">
                                    <img src="assets/images/upload.png" id="upload" alt="">
                                </label>
                                {{-- <div class="post_bottom"> --}}
                                {{-- <div class="post_items"><i class="fa fa-smile" --}}
                                {{-- style="margin-right: 5px"> </i>表情 --}}
                                {{-- </div> --}}
                                {{-- <div class="post_items"> --}}
                                {{-- <input type="file" name="file-1[]" id="file-1" --}}
                                {{-- class="custom-input-img" --}}
                                {{-- data-multiple-caption="{count} files selected" multiple/> --}}
                                {{-- <label for="file-1"> --}}
                                {{-- <i class="fas fa-image"></i> --}}
                                {{-- <span>图片</span> --}}
                                {{-- </label> --}}
                                {{-- </div> --}}
                                {{-- <div class="post_items"><i class="fas fa-video" style="margin-right: 5px"></i>视频 --}}
                                {{-- </div> --}}
                                {{-- <div class="post_items"><i class="fas fa-user-plus" --}}
                                {{-- style="margin-right: 5px"> </i>标记 --}}
                                {{-- </div> --}}
                                {{-- <button class="btn btn-sm btn-primary">发送</button> --}}
                                {{-- </div> --}}
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <h2 class="heading h2 font-weight-bold"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h3 id="example">精选文章📔</h3>
                        <section style="display: flex;flex-wrap:wrap;">
                            @foreach ($postsIndex as $item)
                                {{-- 文章卡牌样式1 已弃用 --}}
                                {{-- <div class="card">
                                <a href="{{ url('posts', ['id' => $item->id]) }}" style="text-decoration: none;"
                                    target="_blank">
                                    <div class="card-body">
                                        <h4 class="heading heading-5 strong-600">{{ $item->title }}</h4>
                                        <h6 class="text-muted mb-1">{{ $item->excerpt }}</h6>
                                        <div class="list-inline mb-1">
                                            <div>
                                                <li class="list-inline-item pr-2">
                                                    <i class="fas fa-heart mr-1"
                                                        style="color: #fc6464"></i>{{ $item->like }}
                                                </li>
                                                <li class="list-inline-item pr-2">
                                                    <i class="fas fa-eye text-muted mr-1"></i> {{ $item->view }}
                                                </li>
                                                <li class="list-inline-item pr-2">
                                                    <p class="text-muted mb-1">{{ getRelativeTime($item->created_at) }}</p>
                                                </li>
                                            </div>
                                            <span
                                                class="badge badge-lg badge-pill badge-primary  text-uppercase">{{ $item->meta_keywords }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                                {{-- 文章卡牌样式1 end 已弃用 --}}
                                <div class="col-md-6">
                                    <a href="{{ url('posts', ['id' => $item->id]) }}"
                                        style="text-decoration: none;color: inherit;" target="_blank">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h4 class="heading h5 mb-0">{{ $item->title }}</h4>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                {{-- <h5 class="heading heading-5 strong-600">{{ $item->title }}</h5> --}}
                                                {{-- <h6 class="heading heading-sm strong-400 text-muted mb-2">
                                                    {{ getRelativeTime($item->created_at) }}
                                                </h6> --}}
                                                <p class="card-text" style="margin-bottom: 1rem;">
                                                    {{ $item->excerpt }}</p>
                                                {{-- <a href="{{ url('posts', ['id' => $item->id]) }}" target="_blank"
                                                    class="btn btn-sm btn-primary">查看详情</a> --}}
                                            </div>
                                            <div class="card-footer">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <img class="avatar avatar-sms bg-purple"
                                                            src="{{ URL::asset('uploads/' . $item->author->avatar) }}"></img>
                                                        <span class="avatar-content">{{ $item->author->name }}</span>
                                                    </div>
                                                    <div class="col text-right text-xs-right">
                                                        <ul class="list-inlineIndex mb-0">
                                                            <li class="list-inline-item mr-3">
                                                                {{ getRelativeTime($item->created_at) }}
                                                            </li>
                                                            <li class="list-inline-item pr-2">
                                                                <i class="fas fa-heart mr-1"
                                                                    style="color: #fc6464"></i>{{ $item->like }}
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <i
                                                                    class="fas fa-eye text-muted mr-1"></i>{{ $item->view }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </section>
                        {{-- 有新的card样式直接写在这里就好了 --}}


                    </div>
                    {{-- 右侧浮动导航栏 --}}
                    {{-- 这个d-none就是手机端隐藏的，去掉就显示了 --}}
                    <div class="col-lg-3 d-none d-lg-inline-block">
                        <div class="sidebar-sticky" data-stick-in-parent="true">
                            {{-- 第一个框框 --}}
                            <div class="card">
                                <div class="card-header py-4">
                                    <h4 class="heading h5 font-weight-500 mb-0">信息栏</h4>
                                </div>
                                <div class="list-group">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" id="time">🕖</li>
                                        <li class="list-group-item">📃 总文章数：{{ $postsCount }}</li>
                                        <li class="list-group-item">💬 每日一言<br><span class="hitokoto" id="yiyancon"></span>
                                        </li>
                                        <script type="text/javascript"
                                            src="https://international.v1.hitokoto.cn?encode=js&amp;charset=utf-8&amp;&amp;c=j&amp;c=k&amp;c=l"></script>
                                        {{-- 每日一言 <script type="text/javascript" src="https://api.xygeng.cn/one/get/"></script> --}}
                                    </ul>
                                </div>
                            </div>
                            {{-- 第一个框框 end --}}
                            {{-- <ul class="section-nav">
                                <li class="toc-entry toc-h3"><a href="#download">定位导航条</a></li>
                                <li class="toc-entry toc-h3"><a href="#metadata">定位导航条</a></li>
                                <li class="toc-entry toc-h3"><a href="#actions">定位导航条</a></li>
                                <li class="toc-entry toc-h3"><a href="#commentable">定位导航条</a></li>
                                <li class="toc-entry toc-h3"><a href="#list-groups">定位导航条</a></li>
                                <li class="toc-entry toc-h3"><a href="#card-with-overlay">Card with overlay</a></li>
                                <li class="toc-entry toc-h3"><a href="#colored-cards">Colored cards</a></li>
                                <li class="toc-entry toc-h3"><a href="#pricing-cards">Pricing cards</a></li>
                                <li class="toc-entry toc-h3"><a href="#icon-cards">Icon cards</a></li>
                            </ul> --}}
                            <div class="card" onclick="window.location.href='{{ url('user/login') }}'">
                                <div class="card-header py-4">
                                    <h4 class="heading h5 font-weight-500 mb-0">登录就送100抽！</h4>
                                </div>
                                <div class="list-group">
                                    <ul class="list-group list-group-flush">
                                        <img src="http://www.pic.lattiex.com/uploads/img/2024/0314/20240314154751-7359.png"
                                            alt="抽奖">
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            {{-- 中间部分的底部信息说明 --}}
            <footer class="px-3 footer bg-white">
                <div class="container ">
                    <div class="row align-items-center py-3 border-top">
                        <script async src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
                        <div class="col-lg-12 text-center">
                            <span id="busuanzi_container_site_pv">基于Webpixels+Bootstrap 4主题</span>
                        </div>
                        <div class="col-lg-12 text-center">
                            <span id="busuanzi_container_site_pv"><i class="fa fa-eye"></i> 本站总访问<span
                                    id="busuanzi_value_site_pv"></span>次</span>
                        </div>
                        <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
                            &copy; 2023 <a href="http://lattiex.com/" target="_blank">Lattiex</a>. All rights
                            reserved.
                        </div>
                        <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
                            备案号: <a href="http://beian.miit.gov.cn/" target="_blank"
                                style="color: inherit">豫ICP备2023022876号.</a>

                        </div>
                        <div class="col-lg-4 text-center text-lg-right">
                            <ul class="nav justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a class="nav-link active" href="https://instagram.com/webpixelsofficial"
                                        target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://facebook.com/webpixels" target="_blank"><i
                                            class="fab fa-facebook"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://github.com/webpixels" target="_blank"><i
                                            class="fab fa-github"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://dribbble.com/webpixels" target="_blank"><i
                                            class="fab fa-dribbble"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>

    {{-- 底部导航  --}}
    {{-- @include('common.footer') --}}
@endsection
@push('script')
    <script>
        //页面时间获取函数
        function getTime() {
            var date = new Date();
            var year = date.getFullYear(); //获取年份
            var month = date.getMonth();
            var day = date.getDate();
            var hour = date.getHours();
            hour = hour < 10 ? '0' + hour : hour; //如果小于10 就在其前面加个0  比如08 09
            var minute = date.getMinutes();
            minute = minute < 10 ? '0' + minute : minute;
            var seconds = date.getSeconds();
            seconds = seconds < 10 ? '0' + seconds : seconds;
            return '🕖' + year + '年' + month + '月' + day + '日&nbsp;' + hour + ':' + minute + ':' + seconds;
        }

        setInterval(function() {
            document.getElementById('time').innerHTML = getTime();
        }, 1000)
        //页面时间获取函数 end
    </script>
@endpush
