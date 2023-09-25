{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','留言')

{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')

@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    <section class="slice slice-lg">
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
                                    <span class="alert-inner--text"><strong>留言成功 </strong> 感谢您的反馈!</span>
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
                    </p>
                    <p class="">
                        这个b班是一天都不想上. Multiple functionalities and controls added,
                        extended color palette and beautiful typography, designed as its own extended version of
                        Bootstrap at the highest level of quality.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="slice bg-tertiary bg-cover bg-size--cover"
             style="background-image: url('../assets/images/backgrounds/img-1.jpg')">
        <span class="mask bg-tertiary alpha-9"></span>
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-6">
                    <div class="card bg-dark alpha-container text-white border-0 overflow-hidden">
                        <a href="#" target="_blank">
                            <div class="card-img-bg"
                                 style="background-image: url('../assets/images/prv/city-1.jpg');"></div>
                            <span class="mask bg-dark alpha-5 alpha-4--hover"></span>
                            <div class="card-body px-5 py-5">
                                <div style="min-height: 300px;">
                                    <h3 class="heading h1 text-white mb-3">示例名称</h3>
                                    <p class="mt-4 mb-1 h5 text-white lh-180">
                                        E: newyork@company.com
                                    </p>
                                    <p class="mb-1 h5 text-white lh-180">
                                        T: 0755.222.333
                                    </p>
                                </div>
                                <span href="#" class="text-white text-uppercase font-weight-500">
                      See on map
                      <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-dark alpha-container text-white border-0 overflow-hidden">
                        <a href="#" target="_blank">
                            <div class="card-img-bg"
                                 style="background-image: url('../assets/images/prv/city-2.jpg');"></div>
                            <span class="mask bg-dark alpha-5 alpha-4--hover"></span>
                            <div class="card-body px-5 py-5">
                                <div style="min-height: 300px;">
                                    <h3 class="heading h1 text-white mb-3">示例名称</h3>
                                    <p class="mt-4 mb-1 h5 text-white lh-180">
                                        E: newyork@company.com
                                    </p>
                                    <p class="mb-1 h5 text-white lh-180">
                                        T: 0755.222.333
                                    </p>
                                </div>
                                <span href="#" class="text-white text-uppercase font-weight-500">
                      See on map
                      <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  底部导航  --}}
    @include('common.footer')
@endsection

@push('script')
    <script>
        {{--document.getElementById('contact_btn').addEventListener('click', function (event) {--}}
        {{--    event.preventDefault(); // Prevent the default form submission behavior--}}

        {{--    const name = document.getElementById('name').value;--}}
        {{--    const email = document.getElementById('name').value;--}}
        {{--    const content = document.getElementById('name').value;--}}
        {{--    $.ajax({--}}
        {{--        type: 'post',--}}
        {{--        url: '{{ url("home/contact_form") }}',--}}
        {{--        data: {--}}
        {{--            name,--}}
        {{--            email,--}}
        {{--            content--}}
        {{--        },--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        },--}}
        {{--        dataType: 'json',--}}
        {{--        success: function (res) {--}}
        {{--            console.log('Ajax response:', res);--}}
        {{--        },--}}
        {{--        error: function () {--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endpush
