{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','留言')

{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/home.css')}}">
@endpush
@section('content')
    {{--  顶部导航  --}}
    @include('common.navbar')

    <section class="slice-lg">
        <div class="container">
            <div class="row align-items-center cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-6">
                    <h3 class="heading h3 mb-4">给我留言</h3>
                    @if (session('success'))
                        {{--提示框--}}
                        <div class="row justify-content-center">
                            <div class="col-lg-8 alert-box-success">
                                <div
                                    class="alert wow fadeInUp alert-success alert-dismissible fade1 show1"
                                    role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-check"></i></span>
                                    <span
                                        class="alert-inner--text"><strong>留言成功 </strong> 感谢您的反馈!</span>
                                    <button type="button" class="undo" aria-label="Undo">关闭
                                    </button>
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form class=" wow fadeInUp" data-wow-delay="200ms"
                          style="margin-top: 3rem" action="{{url('home/contact_form')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="您的姓名" name="name" id="name" type="text"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="您的邮箱地址" name="email" id="email"
                                           type="email"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="content" id="content"
                                              placeholder="请输入内容......" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" id="contact_btn" class="btn btn-primary px-4">
                                留言
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 ml-lg-auto">
                    <h3 class="heading heading-3 strong-300">
                        可以通过以下方式联系
                        <br>
                        邮件或者QQ
                    </h3>
                    <p class="lead mt-4 mb-4">
                        Email: <a href="#">Lattiex@outlook.com</a>
                        <br>
                        QQ: 1625116337
                        <br>
                        Address: 翻斗大街翻斗花园2号楼1001室
                    </p>

                    <p class="">
                        这个b班是一天都不想上. Multiple functionalities and controls added,
                        extended color palette and beautiful typography, designed as its own extended version of
                        Bootstrap at the highest level of quality.
                    </p>
                </div>

                {{--留言内容部分--}}
                <div class="col-lg-12">
                    <h3 class="heading h3 mb-4" style="padding-top: 2rem"><i
                            class="fa fa-anchor"></i> 留言数量 <span style="color: #7272f5">{{$count}}</span></h3>
                    <div id="comments_msg">
                        @include('contact_msg')
                    </div>

                </div>

            </div>
            {{--显示分页器--}}
            {{ $message->links('contact_pagination') }} <!-- 显示分页链接 -->
        </div>


    </section>

    @include('common.gift')

    {{--  底部导航  --}}
    {{-- @include('common.footer')--}}
@endsection

@push('script')
    <script>
        // 监听分页器链接的点击事件
        $('.pagination a').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            window.location.href = url;
        });


    </script>
@endpush
