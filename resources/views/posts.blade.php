{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title',$posts->title)

{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/home.css')}}">
@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    <main class="main" style="padding-top: 6rem;background: RGB(242, 243, 245)">
        <div class="container">
            <div class="row">
                {{-- 文章内容 --}}
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            {{--提示框--}}
                            <div class="row justify-content-center" id="alert">
                                <div class="col-lg-8 alert-box-success">
                                    <div
                                        class="alert wow fadeInUp alert-warning alert-dismissible fade1 show1"
                                        role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-exclamation"></i></span>
                                        <span
                                            class="alert-inner--text"><strong>您已经点赞过 </strong> 无需重复点赞!</span>
                                        <button type="button" class="undo" aria-label="Undo">关闭
                                        </button>
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{--提示框end--}}
                            <div class="card-posts">
                                <div class="card-body">
                                    <h1 class="heading heading-5 strong-600">{{$posts->title}}</h1>
                                    <div class="posts-time-box">
                                        <span class="strong-400 text-muted ">
                                            {{$posts->created_at}}
                                        </span>
                                        <span class="list-inline-item posts-view">
                                            <i class="fas fa-eye text-muted mr-1"></i>{{$posts->view}}
                                        </span>
                                    </div>
                                    <p class="card-text">{{$posts->excerpt}}</p>
                                    {{--使用Laravel的{!! !!}语法，它会告诉Laravel不要对内容进行HTML转义，而是直接输出HTML。--}}
                                    <div>{!! $posts->body !!}</div>
                                    {{--<a href="#" class="btn btn-sm btn-primary">Go somewhere</a>--}}
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
                                                    <span
                                                        class="btn btn-sm btn-outline-secondary btn-label"
                                                        id="likeCount{{$posts->id}}">{{$posts->like}}</span>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--评论区--}}
                            <div class="commentBox">
                                {{--<h3 class="heading h3 mb-4">评论</h3>--}}
                                <div class="card">
                                    <div class="card-header py-4">
                                        <div class="d-flex align-items-center">
                                            <h4 class="heading h5 mb-0">评论</h4>
                                        </div>
                                    </div>
                                    <div class="list-group">
                                        <a href="#"
                                           class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="list-group-img">
                                                <span class="avatar bg-purple">JD</span>
                                            </div>
                                            <div class="list-group-content">
                                                <div class="list-group-heading">Johnyy Depp <small>10:05 PM</small>
                                                </div>
                                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipiscing
                                                    eiusmod tempor</p>
                                            </div>
                                        </a>
                                        <a href="#"
                                           class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="list-group-img">
                                                <span class="avatar bg-pink">TC</span>
                                            </div>
                                            <div class="list-group-content">
                                                <div class="list-group-heading">Tom Cruise <small>11:30 PM</small></div>
                                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipiscing
                                                    eiusmod tempor</p>
                                            </div>
                                        </a>
                                        <a href="#"
                                           class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="list-group-img">
                                                <span class="avatar bg-blue">WS</span>
                                            </div>
                                            <div class="list-group-content">
                                                <div class="list-group-heading">Will Smith <small>15:45 PM</small></div>
                                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipiscing
                                                    eiusmod tempor</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <form class="card-comment-box" role="form">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <input class="form-control" placeholder="e.g @willsmith">
                                                </div>
                                                <div class="col-4 text-right">
                                                    <button type="button"
                                                            class="btn btn-sm btn-success btn-icon-only rounded-circle">
                                                        <span class="btn-inner--icon"><i
                                                                class="fas fa-check"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- 右侧个人信息 --}}
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span
                                        class="avatar avatar-md bg-purple"><img
                                            src="{{ config('app.url') . '/uploads/'.( $AuthorInfo->avatar) }}"
                                            alt="作者头像"/> </span>
                                    <span class="avatar-content">{{$AuthorInfo->name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="heading heading-5 strong-600">用户信息自定义</h6>
                            <h6 class="heading heading-sm strong-400 text-muted mb-4">
                                2小时前
                            </h6>
                            <p class="card-text">也是用户信息</p>
                            <a href="#" class="btn btn-sm btn-primary">点击跳转的一个按钮</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        // 刚开始吧提示框设置为隐藏
        $('#alert').css('display', 'none')

        function likeRequest(postId) {
            $.ajax({
                url: "{{url('home/like_request')}}/" + postId,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    // 更新点赞数量显示
                    $('#likeCount' + postId).text(data.newLikeCount);
                },
                error: function () {
                    // 处理错误
                    $('#alert').removeAttr('style')
                }
            });
        }
    </script>
@endpush
