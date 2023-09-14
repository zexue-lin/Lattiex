{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','个人资料')

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/profile.css')}}">
@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    {{-- 主要内容 --}}
    <main class="main">
        <section class="profile-container" style="background-image: url(
                '{{ asset('assets/images/backgrounds/profile-bac.jpg') }}')">

            <div class="container slice slice-sm">
                <span class="profile-title" style="color: pink">个人信息设置</span>
                <div class="user-avatar wow fadeInUp">
                    <img src="{{URL::asset('assets/images/avatar/default.jpg')}}" class="avatar avatar-lg mr-3"
                         alt="默认头像">
                </div>
                <form class="profile wow fadeInUp" data-wow-delay="200ms" action="{{url('home/user/profileForm')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nickname" style="color: dodgerblue">昵称</label>
                        <input type="text" class="form-control" value="11" name="nickname"
                               id="nickname"
                               placeholder="请输入姓名" required/>
                    </div>
                    <div class="form-group form-group-sex">
                        <label for="sex" style="color: dodgerblue">性别</label>
                        <div class="d-inline-block custom-control custom-radio mb-3">
                            <input type="radio" name="custom-radio-1" class="custom-control-input"
                                   id="customRadio1">
                            <label class="custom-control-label" for="customRadio1" style="color: dodgerblue">男</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio mb-2 ml-3">
                            <input type="radio" name="custom-radio-1" class="custom-control-input" id="customRadio2"
                                   checked="">
                            <label class="custom-control-label" for="customRadio2" style="color: dodgerblue">女</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio mb-3">
                            <input type="radio" name="custom-radio-1" class="custom-control-input" id="customRadio3"
                                   checked="">
                            <label class="custom-control-label" for="customRadio3"
                                   style="color: dodgerblue">保密</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="color: dodgerblue">生日</label>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select class="selectpicker" title="请选择" name="year" id="year">
                                    <option>Alerts</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="请选择" name="month" id="month">
                                    <option>Alerts</option>
                                    <option>Badges</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="请选择" name="date" id="date">
                                    <option>Alerts</option>
                                    <option>Badges</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="email" style="color: dodgerblue">邮箱</label>
                        <input type="email" class="form-control" id="email" value="11"
                               placeholder="请输入邮箱" required/>
                    </div>

                    <div class="form-group">
                        <label for="phone" style="color: dodgerblue">手机号</label>
                        <input type="tel" class="form-control" value="11" name="phone" id="phone"
                               placeholder="请输入密码"/>
                    </div>

                    <div class="form-group  form-group-secret">
                        <label for="password" style="color: dodgerblue">密码</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="留空默认不修改密码"
                        />
                    </div>


                    <div class="form-group">
                        <label for="phone" style="color: dodgerblue">所在地</label>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select class="selectpicker" title="省" data-live-search="true"
                                        name="province" id="province"
                                        data-live-search-placeholder="搜索 ...">
                                    <option>Alerts</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="市" data-live-search="true" name="city"
                                        id="city"
                                        data-live-search-placeholder="搜索 ...">
                                    <optgroup label="Components">
                                        <option>Alerts</option>
                                        <option>Badges</option>
                                    </optgroup>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="地区" data-live-search="true"
                                        name="district" id="district"
                                        data-live-search-placeholder="搜索 ...">
                                    <optgroup label="Components">
                                        <option>Alerts</option>
                                        <option>Badges</option>
                                    </optgroup>

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="profile-btn">
                        <button type="button" class="btn btn-primary btn-animated btn-animated-x">
                            <span class="btn-inner--visible">确认修改</span>
                            <span class="btn-inner--hidden"><i class="fas fa-arrow-right"></i></span>
                        </button>
                    </div>

                </form>

            </div>
        </section>

    </main>
    {{--  底部导航  --}}
    @include('common.footer')

@endsection
