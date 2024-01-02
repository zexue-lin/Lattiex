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

        {{--侧边可滚动导航栏--}}
        @include('common.scrollbar')

        <section class="content" style="padding-top: 6rem">
            <div class="content-inner content-docs">
                <div class="pt-3 pb-4 mb-4 border-bottom">
                    {{--一共12份，分成了6+3 两份--}}
                    <div class="row">
                        <div class="col-1">
                            {{--<h2 class="heading h2 font-weight-bold"></h2>--}}
                        </div>
                        <div class="col-lg-6">
                            <h2 class="heading h2 font-weight-bold">翻斗花园</h2>
                            <form class="post_area">
                                <div class="form-group">
                                    <textarea class="form-control textarea-autosize"
                                              placeholder="只因你太美，Oh，baby..."
                                              rows="1"></textarea>
                                </div>
                                <label for="file-1" id="avatarbox">
                                    <img src="assets/images/upload.png" id="upload" alt="">
                                </label>
                                <div class="post_bottom">
                                    <div class="post_items"><i class="fa fa-smile"
                                                               style="margin-right: 5px"> </i>表情
                                    </div>
                                    <div class="post_items">
                                        <input type="file" name="file-1[]" id="file-1"
                                               class="custom-input-img"
                                               data-multiple-caption="{count} files selected" multiple/>
                                        <label for="file-1">
                                            <i class="fas fa-image"></i>
                                            <span>图片</span>
                                        </label>
                                    </div>
                                    <div class="post_items"><i class="fas fa-video" style="margin-right: 5px"></i>视频
                                    </div>
                                    <div class="post_items"><i class="fas fa-user-plus"
                                                               style="margin-right: 5px"> </i>标记
                                    </div>
                                    <button class="btn btn-sm btn-primary">发送</button>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @foreach($postsIndex as $item)
                            <div class="card" style="">
                                <a href="{{ url('posts', ['id' => $item->id]) }}"
                                   style="text-decoration: none;" target="_blank">
                                    <div class="card-body">
                                        <h3 class="heading heading-5 strong-600">{{$item->title}}</h3>
                                        <h6 class="text-muted mb-1">时间：{{$item->created_at}}</h6>
                                        <h5 class="card-text">{{$item->excerpt}}</h5>
                                        <div class="list-inline mb-1">
                                            <div>
                                                <li class="list-inline-item pr-2"
                                                    onclick="handleLikeClick({{$item->like}})">
                                                    <i class="fas fa-heart mr-1" id="likeIcon"
                                                       style="color: #a9a9a9"></i>{{$item->like}}
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fas fa-eye text-muted mr-1"></i> {{$item->view}}
                                                </li>
                                            </div>
                                            <span
                                                class="badge badge-lg badge-pill badge-secondary text-uppercase">{{$item->meta_keywords}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <div class="card" style="margin-bottom: 20px">
                            <div class="card-header py-4">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-md bg-purple">头像</span>
                                    <div class="avatar-content">
                                        <h5 class="h6 mb-0">用户名称</h5>
                                        <small class="d-block text-muted">2023.10.12 15:30:21</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="card-icon-actions card-icon-actions-lg">
                                            <a href="#" class="love active"><i class="fas fa-heart"></i></a>
                                            <a href="#"><i class="fas fa-comment"></i></a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-icon-actions card-icon-actions-lg text-right">
                                            <a href="#"><i class="fas fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="heading h6 mb-3">23 点赞</h6>
                                <p class="card-text">我的发，啥时候才能给我涨工资哇</p>
                            </div>

                            <div class="card-image">
                                <img src="{{URL::asset('assets/images/avatar/default.jpg')}}"
                                     class="img-fluid" style="width: 8rem">
                            </div>
                            <div class="card-footer">
                                <div class="row ">
                                    <div class="col-10">
                                        <form class="card-comment-box" role="form">
                                                        <textarea rows="1" class="form-control textarea-autosize"
                                                                  placeholder="添加评论..."></textarea>
                                        </form>
                                    </div>
                                    <div class="col-2 text-right">
                                        <div class="card-icon-actions card-icon-actions-lg">
                                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu py-0 text-center">
                                                <a class="dropdown-item" href="#">Got to post</a>
                                                <a class="dropdown-item" href="#">Repost inappropriate</a>
                                                <a class="dropdown-item" href="#">Embed</a>
                                                <a class="dropdown-item" href="#">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
                    </div>
                    {{--右侧浮动导航栏--}}
                    <div class="col-lg-3 d-none d-lg-inline-block">
                        <div class="sidebar-sticky" data-stick-in-parent="true">
                            <ul class="section-nav">
                                <li class="toc-entry toc-h3"><a href="#download">Example</a></li>
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

    {{--  底部导航  --}}
    {{-- @include('common.footer')--}}
@endsection
@push('script')
    <script>
        function handleLikeClick() {

            // 在这里可以执行你想要的操作，比如增加点赞数、显示点赞信息等
            alert('你进行了点赞，应该: ' + 1);
            event.preventDefault(); // 阻止默认行为（网页跳转）
            // 删除元素的style属性
            const element = document.getElementById('likeIcon');
            element.removeAttribute('style');
        }

    </script>
@endpush
