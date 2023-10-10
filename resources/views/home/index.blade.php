{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','翻斗花园')

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
            {{--            <div class="sidebar-brand">--}}
            {{--                <h1 class="font-weight-400"><a href="../"><span class="font-weight-700">Boomerang</span> UI Kit</a></h1>--}}
            {{--            </div>--}}

            {{--玩跑轮的仓鼠--}}
            <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
                <div class="wheel"></div>
                <div class="hamster">
                    <div class="hamster__body">
                        <div class="hamster__head">
                            <div class="hamster__ear"></div>
                            <div class="hamster__eye"></div>
                            <div class="hamster__nose"></div>
                        </div>
                        <div class="hamster__limb hamster__limb--fr"></div>
                        <div class="hamster__limb hamster__limb--fl"></div>
                        <div class="hamster__limb hamster__limb--br"></div>
                        <div class="hamster__limb hamster__limb--bl"></div>
                        <div class="hamster__tail"></div>
                    </div>
                </div>
                <div class="spoke"></div>
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
                <div class="pt-3 pb-4 mb-4 border-bottom">
                    {{--一共12份，分成了6+3 两份--}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="post_area">
                                <h2 class="heading h2 font-weight-bold">分享</h2>
                                <div class="form-group">
                                    <textarea class="form-control textarea-autosize"
                                              placeholder="由你分享..."
                                              rows="1"></textarea>
                                </div>
                                <div class="post_bottom">
                                    <div class="post_items"><i class="fa fa-smile"
                                                               style="margin-right: 5px"> </i>表情
                                    </div>
                                    <div class="post_items"><i class="fas fa-image" style="margin-right: 5px"></i>图片
                                    </div>
                                    <div class="post_items"><i class="fas fa-video" style="margin-right: 5px"></i>视频
                                    </div>
                                    <div class="post_items"><i class="fas fa-user-plus"
                                                               style="margin-right: 5px"> </i>标记
                                    </div>
                                    <button class="btn btn-sm btn-primary">发送</button>
                                </div>


                            </div>
                        </div>
                    </div>
                    {{--<div class="col-3">--}}
                    {{--<h2 class="heading h2 font-weight-bold">Form elements</h2>--}}
                    {{--</div>--}}

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h3 id="example">我要玩金铲铲</h3>
                        <div class="code-example">
                            <div class="card" style="width: 18rem;">
                                <img class="img-fluid" src="" alt="Card image cap"/>
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text....</p>
                                    <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <h3 id="metadata">Metadata</h3>
                        <div class="code-example">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="heading heading-5 strong-600">Special title treatment</h5>
                                            <h6 class="text-muted mb-4">2 hrs ago</h6>
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                            <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="heading heading-5 strong-600">Special title treatment</h5>
                                            <ul class="list-inline mb-4">
                                                <li class="list-inline-item pr-2">
                                                    <a href="#"><i class="fas fa-heart mr-1"></i> 50</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fas fa-eye text-muted mr-1"></i> 750
                                                </li>
                                            </ul>
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                            <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="highlight">

                        </div>
                        <div class="code-example">
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
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
                        <div class="highlight">

                        </div>
                        <h3 id="actions">Actions</h3>
                        <div class="code-example">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="heading h5 mb-0">Favorite post</h4>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card-icon-actions text-right">
                                                        <a href="#" class="favorite active" data-toggle="tooltip"
                                                           data-original-title="Save to favorites"><i
                                                                class="fas fa-star"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <a href="#" class="btn btn-sm btn-primary">Action button</a>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="text-muted">2 hrs ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="heading h5 mb-0">Love &amp; bookmark post</h4>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card-icon-actions text-right">
                                                        <a href="#" class="favorite" data-toggle="tooltip"
                                                           data-original-title="Save as favorite"><i
                                                                class="fas fa-star"></i></a>
                                                        <a href="#" class="love active" data-toggle="tooltip"
                                                           data-original-title="Love this"><i
                                                                class="fas fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <a href="#" class="btn btn-sm btn-primary">Action button</a>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="text-muted">2 hrs ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h3 id="list-groups">List groups</h3>
                        <div class="code-example">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header py-4">
                                            <h4 class="heading h5 font-weight-500 mb-0">Simple list group</h4>
                                        </div>
                                        <div class="list-group">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Cras justo odio</li>
                                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                                <li class="list-group-item">Vestibulum at eros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
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
                        <div class="col-lg-3 text-center text-lg-left mb-2 mb-lg-0">
                            &copy; 2018 <a href="https://webpixels.io/" target="_blank">Webpixels</a>. All rights
                            reserved.
                        </div>
                        <div class="col-lg-3 text-center text-lg-left mb-2 mb-lg-0">
                            &copy; 备案号: <a href="http://beian.miit.gov.cn/" target="_blank">豫ICP备2023022876号.</a>

                        </div>
                        <div class="col-lg-6 text-center text-lg-right">
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

    {{--  底部导航  --}}
    {{-- @include('common.footer')--}}
@endsection
