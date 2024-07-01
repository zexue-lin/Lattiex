{{-- 首页页面 子视图 --}}
@extends('layouts.home')

@section('title', $posts->title)

{{-- 设置token -- ajax请求必须需要 --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- 页面独立的css文件 --}}
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/home.css') }}">
    {{-- 代码高亮js --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
@endpush
@section('content')
    {{-- 顶部导航 --}}
    @include('common.navbar')

    <main class="main" style="padding-top: 6rem;background: RGB(242, 243, 245)">
        <div class="container">
            <div class="row">
                {{-- 文章内容 --}}
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- 提示框 --}}
                            <div class="row justify-content-center" id="alert" style="display: none">
                                <div class="col-lg-8 alert-box-success">
                                    <div class="alert wow fadeInUp alert-warning alert-dismissible fade show"
                                         role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-exclamation"></i></span>
                                        <span
                                            class="alert-inner--text"><strong>您已经点赞过 </strong> 无需重复点赞!</span>
                                        <button type="button" class="undo" aria-label="Undo">关闭
                                        </button>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- 提示框end --}}
                            <div class="card-posts">
                                <div class="card-body">
                                    <h1 class="heading heading-5 strong-600">{{ $posts->title }}</h1>
                                    <div class="posts-time-box">
                                        <span class="strog-400 mr-3">
                                            <i class="fas fa-user text-muted mr-1"></i>
                                            {{ $AuthorInfo->name }}
                                        </span>
                                        <i class="fas fa-clock text-muted mr-1"></i>
                                        <span class="strong-400 text-muted ">
                                            {{ $posts->created_at }}
                                        </span>
                                        <span class="list-inline-item posts-view">
                                            <i class="fas fa-eye text-muted mr-0"></i>
                                            <ii class="ii"> {{ $posts->view }}</ii>
                                        </span>
                                    </div>
                                    <p class="card-text">{{ $posts->excerpt }}</p>
                                    {{-- 使用Laravel的{!! !!}语法，它会告诉Laravel不要对内容进行HTML转义，而是直接输出HTML。 --}}
                                    {{-- 使用data-post-id将文章id储存在这里 --}}
                                    <div id="post" data-post-id="{{ $posts->id }}">
                                        <div>{!! $posts->body !!}</div>
                                    </div>
                                    {{-- <a href="#" class="btn btn-sm btn-primary">Go somewhere</a> --}}
                                </div>
                                <div class="card-footer">
                                    <div class="row align-items-center">
                                        <div class="col text-right text-xs-right">
                                            <ul class="list-inline mb-0">
                                                <div class="btn-group btn-action-label" role="group" aria-label="Like">
                                                    <a type="button" class="btn btn-sm btn-secondary btn-action"
                                                       onclick="likeRequest({{ $posts->id }})">
                                                        <i class="fas fa-thumbs-up"></i>
                                                        <span>Like</span>
                                                    </a>
                                                    <span class="btn btn-sm btn-outline-secondary btn-label"
                                                          id="likeCount{{ $posts->id }}">{{ $posts->like }}</span>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 评论区 --}}
                            <div class="commentBox">
                                {{-- <h3 class="heading h3 mb-4">评论</h3> --}}
                                <div class="card-website">
                                    <div class="card-header py-4">
                                        <div class="d-flex align-items-center">
                                            <h4 class="heading h5 mb-0">评论</h4>
                                        </div>
                                    </div>
                                    <div class="list-group">
                                        @if (empty(Cookie::get('LoginUser')))
                                            <div style="display: flex;flex-direction: column;">
                                                <a type="button" class="btn btn-md btn-outline-secondary btn-icon"
                                                   href="{{ url('user/login') }}">
                                                    <span class="btn-inner--text">登录/注册 即可发表你的评论</span>
                                                    <span class="btn-inner--icon"><i
                                                            class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        @endif
                                        {{-- 先检查该篇文章有是否有评论 --}}
                                        @if ($comment->isNotEmpty())
                                            {{-- 先从视图拿五条评论 --}}
                                            @foreach ($comment->take(5) as $item)
                                                <a href="#"
                                                   class="list-group-item list-group-item-action d-flex align-items-center comment-item"
                                                   onclick="return false;">
                                                    <div class="list-group-img">
                                                        <img class="avatar bg-purple"
                                                             src="{{ URL::asset('uploads/' . $item->avatar) }}"
                                                             alt="用户头像"></img>
                                                    </div>
                                                    <div class="list-group-content">
                                                        <div class="list-group-heading"><b>{{ $item->username }}</b>
                                                            <small>{{ $item->created_at }}
                                                            </small>
                                                        </div>
                                                        <div class="list-group-heading">{{ $item->content }}</div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="card-footer">
                                        {{-- 如果评论数超过五条，则显示“查看剩下的全部评论”按钮 --}}
                                        @if ($comment->count() >= 5)
                                            <div style="display: flex;flex-direction: column;margin-bottom: 20px;">
                                                <button type="button" class="btn btn-sm btn-outline-primary btn-icon"
                                                        id="loadMore">
                                                    <span
                                                        class="btn-inner--text">查看剩下的{{ $comment->count() - 5 }}条全部评论</span>
                                                    <span class="btn-inner--icon"><i
                                                            class="fas fa-arrow-down"></i></span>
                                                </button>
                                            </div>
                                        @endif
                                        <form class="card-comment-box" role="form"
                                              action="{{ url('home/PostComment') }}">
                                            @csrf
                                            <div class="row align-items-center">
                                                <div class="col-11">
                                                    <textarea rows="1" class="form-control textarea-autosize"
                                                              placeholder="在此输入您的评论..."></textarea>
                                                </div>
                                                <div class="col-1 text-right">
                                                    <button type="button"
                                                            class="btn btn-sm btn-success btn-icon-only rounded-circle">
                                                        <span class="btn-inner--icon"><i
                                                                class="fas fa-check"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    {{-- 提示框 --}}

                                    <div class="row justify-content-center" id="alert1" style="display: none">
                                        <div class="col-lg-8 alert-box-success">
                                            <div class="alert wow fadeInUp alert-warning alert-dismissible fade show"
                                                 role="alert">
                                                <span class="alert-inner--icon"><i
                                                        class="fas fa-exclamation"></i></span>
                                                <span
                                                    class="alert-inner--text"><strong>评论失败 </strong> 请先登录!</span>

                                                <button type="button" class="undo" aria-label="Undo">关闭
                                                </button>
                                                <span style="margin: auto;">点击前往<a
                                                        href="{{ url('user/login') }}">登录</a></span>
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- 提示框end --}}
                                </div>
                            </div>
                            {{-- 评论区end --}}
                        </div>
                    </div>
                </div>
                {{-- 右侧个人信息 --}}
                <div class="col-lg-3">
                    <div class="card-website">
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img class="avatar avatar-md bg-purple"
                                         src="{{ config('app.url') . '/uploads/' . $AuthorInfo->avatar }}"
                                         alt="作者头像"/>
                                    <span class="avatar-content h6">{{ $AuthorInfo->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="card-text">邮箱：{{ $AuthorInfo->email }}</span>
                            {{-- <h6 class="heading heading-sm strong-400 text-muted mb-4"> --}}
                            {{-- 2小时前 --}}
                            {{-- </h6> --}}
                            <p class="card-text">示例用户信息</p>
                            <a href="#" class="btn btn-sm btn-primary">无用按钮</a>
                        </div>
                    </div>
                </div>
                {{-- 右侧个人信息end --}}
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script src="{{ asset('assets/js/home/posts.js') }}"></script>
@endpush
