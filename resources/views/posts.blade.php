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
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="heading heading-5 strong-600">Special title treatment</h1>
                                    <div class="posts-time-box">
                                        <span class="strong-400 text-muted ">
                                            {{$posts->created_at}}
                                        </span>
                                        <span class="list-inline-item posts-view">
                                            <i class="fas fa-eye text-muted mr-1"></i>{{$posts->view}}
                                        </span>
                                    </div>

                                    <p class="card-text">With supporting text below...</p>
                                    <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer">
                                    <div class="row align-items-center">

                                        <div class="col text-right text-xs-right">
                                            <ul class="list-inline mb-0">
                                                <div class="btn-group btn-action-label" role="group" aria-label="Like">
                                                    <button type="button" class="btn btn-sm btn-secondary btn-action">
                                                        <i class="fas fa-thumbs-up"></i>
                                                        <span>Like</span>
                                                    </button>
                                                    <a href="#"
                                                       class="btn btn-sm btn-outline-secondary btn-label">1030</a>
                                                </div>

                                            </ul>
                                        </div>
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
                                    <span class="avatar avatar-md bg-purple">头像</span>
                                    <span class="avatar-content">{{$UserInfo->name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="heading heading-5 strong-600">Special title treatment</h6>
                            <h6 class="heading heading-sm strong-400 text-muted mb-4">
                                2 hrs ago
                            </h6>
                            <p class="card-text">With supporting text below...</p>
                            <a href="#" class="btn btn-sm btn-primary">Go somewhere</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>

    </script>
@endpush
