{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','食用功能网址')

{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/home.css')}}">
@endpush

@section('content')
    {{--  顶部导航  --}}
    @include('common.navbar')

    {{--  主体内容  --}}
    <main class="main">
        <aside class="sidebar" id="nav_docs">
            {{--这里是仓鼠上面的一个大标题，隐藏掉了--}}
            <div class="sidebar-brand">
                <h1 class="font-weight-400"><a href="../"><span class="font-weight-700">"食用"功能网址</span> 分享</a>
                </h1>
            </div>
            {{--侧边可滚动导航栏--}}
            <div class="scrollbar-inner">
                <ul class="navigation pr-3">
                    <li class="navigation-title">标题一</li>
                    <li class="navigation-item">
                        <a href="introduction.html" class="navigation-link">Introduction</a>
                    </li>
                    <li class="navigation-item">
                        <a href="file-structure.html" class="navigation-link">File structure</a>
                    </li>
                    <li class="navigation-item">
                        <a href="plugins.html" class="navigation-link">Plugins</a>
                    </li>
                    <li class="navigation-item">
                        <a href="customization.html" class="navigation-link">Customization</a>
                    </li>
                    <li class="navigation-item">
                        <a href="update.html" class="navigation-link">Update</a>
                    </li>
                    <li class="navigation-title">标题二</li>
                    <li class="navigation-item">
                        <a href="colors.html" class="navigation-link">Colors</a>
                    </li>
                    <li class="navigation-item">
                        <a href="typography.html" class="navigation-link">Typography</a>
                    </li>
                    <li class="navigation-item">
                        <a href="icons.html" class="navigation-link">Icons</a>
                    </li>
                    <li class="navigation-title">标题三</li>
                    <li class="navigation-item">
                        <a href="alerts.html" class="navigation-link">Alerts</a>
                    </li>
                    <li class="navigation-item">
                        <a href="avatars.html" class="navigation-link">Avatars</a>
                    </li>
                    <li class="navigation-item">
                        <a href="badges.html" class="navigation-link">Badges</a>
                    </li>
                    <li class="navigation-item">
                        <a href="buttons.html" class="navigation-link">Buttons</a>
                    </li>
                    <li class="navigation-item">
                        <a href="cards.html" class="navigation-link">Cards</a>
                    </li>
                    <li class="navigation-item">
                        <a href="dropdowns.html" class="navigation-link">Dropdowns</a>
                    </li>
                    <li class="navigation-item">
                        <a href="forms.html" class="navigation-link">Forms</a>
                    </li>
                    <li class="navigation-item">
                        <a href="modal.html" class="navigation-link">Modal</a>
                    </li>
                    <li class="navigation-item">
                        <a href="navbar.html" class="navigation-link">Navbar</a>
                    </li>
                    <li class="navigation-item">
                        <a href="navs.html" class="navigation-link">Navs</a>
                    </li>
                    <li class="navigation-item">
                        <a href="pagination.html" class="navigation-link">Pagination</a>
                    </li>
                    <li class="navigation-item">
                        <a href="progress.html" class="navigation-link">Progress</a>
                    </li>
                    <li class="navigation-item">
                        <a href="tables.html" class="navigation-link">Tables</a>
                    </li>
                    <li class="navigation-item">
                        <a href="tooltips.html" class="navigation-link">Tooltips</a>
                    </li>
                </ul>
            </div>
        </aside>
        <section class="content" style="margin-top: 62px">
            <div class="content-inner content-docs">
                {{--<div class="pt-3 pb-4 mb-4 border-bottom">--}}
                {{--    --}}
                {{--</div>--}}
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 id="example" style="margin-bottom: 1.5rem">工具类网站</h2>
                        <div class="row item_row">
                            @foreach($websites1 as $item)
                                <div class="card_web" data-toggle="tooltip"
                                     data-placement="bottom"
                                     title="{{$item->toggle_title}}">
                                    <a href="{{$item->href}}" style="text-decoration: none;" target="_blank">
                                        <div style="width: 10rem;">
                                            <div class="card_web-body">
                                                <h5 class="card_web-title">{{$item->title}}</h5>
                                                <p class="card_web-text">{{$item->text}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <h2 id="example" style="margin-bottom: 1.5rem">下载类网站</h2>
                        <div class="row item_row">
                            @foreach($websites2 as $item)
                                <div class="card_web" data-toggle="tooltip"
                                     data-placement="bottom"
                                     title="{{$item->toggle_title}}">
                                    <a href="{{$item->href}}" style="text-decoration: none;" target="_blank">
                                        <div style="width: 10rem;">
                                            <div class="card_web-body">
                                                <h5 class="card_web-title">{{$item->title}}</h5>
                                                <p class="card_web-text">{{$item->text}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    {{--右侧浮动导航栏--}}
                    <div class="col-lg-3 d-none d-lg-inline-block">
                        <div class="sidebar-sticky" data-stick-in-parent="true">
                            <ul class="section-nav">
                                <li class="toc-entry toc-h3"><a href="#example">Example</a></li>
                                <li class="toc-entry toc-h3"><a href="#metadata">Metadata</a></li>
                                <li class="toc-entry toc-h3"><a href="#actions">Actions</a></li>
                                <li class="toc-entry toc-h3"><a href="#commentable">Commentable</a></li>
                                <li class="toc-entry toc-h3"><a href="#list-groups">List groups</a></li>
                                <li class="toc-entry toc-h3"><a href="#card-with-overlay">Card with overlay</a></li>
                                <li class="toc-entry toc-h3"><a href="#colored-cards">Colored cards</a></li>
                                <li class="toc-entry toc-h3"><a href="#pricing-cards">Pricing cards</a></li>
                                <li class="toc-entry toc-h3"><a href="#icon-cards">Icon cards</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            {{--中间部分的底部信息说明--}}
            <footer class="px-3 footer bg-white">
                <div class="container ">
                    <div class="row align-items-center py-3 border-top">
                        <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
                            &copy; 2023 <a href="http://lattiex.com/" target="_blank">Lattiex</a>. All rights
                            reserved.
                        </div>
                        <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
                            &copy; 备案号: <a href="http://beian.miit.gov.cn/" target="_blank">豫ICP备2023022876号.</a>

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
@endsection


@push('script')
    <script>

    </script>
@endpush

