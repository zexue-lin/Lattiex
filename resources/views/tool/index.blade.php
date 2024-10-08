@extends('layouts.home')

@section('title','工具网站')

{{--页面独立css文件--}}
@push('css')
<link rel="stylesheet" href="{{URL::asset('assets/css/home.css')}}">
@endpush

{{--文章主要部分--}}
@section('content')
@include('common.navbar')
<main class="main">
  <aside class="sidebar" id="nav_docs">
    {{--这里是仓鼠上面的一个大标题，隐藏掉了--}}
    <div class="sidebar-brand">
      <h1 class="font-weight-400"><a href="../"><span class="font-weight-700">翻斗花园</span> 工具</a></h1>
    </div>
    {{--玩跑轮的仓鼠--}}
    {{-- <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">--}}
    {{-- <div class="wheel"></div>--}}
    {{-- <div class="hamster">--}}
    {{-- <div class="hamster__body">--}}
    {{-- <div class="hamster__head">--}}
    {{-- <div class="hamster__ear"></div>--}}
    {{-- <div class="hamster__eye"></div>--}}
    {{-- <div class="hamster__nose"></div>--}}
    {{-- </div>--}}
    {{-- <div class="hamster__limb hamster__limb--fr"></div>--}}
    {{-- <div class="hamster__limb hamster__limb--fl"></div>--}}
    {{-- <div class="hamster__limb hamster__limb--br"></div>--}}
    {{-- <div class="hamster__limb hamster__limb--bl"></div>--}}
    {{-- <div class="hamster__tail"></div>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- <div class="spoke"></div>--}}
    {{-- </div>--}}
    {{--玩跑轮的仓鼠end--}}
    {{--侧边可滚动导航栏--}}
    <div class="scrollbar-inner">
      <ul class="navigation pr-3">
        <li class="navigation-title">分类一</li>
        <li class="navigation-item">
          <a href="{{url('tool/QRcode')}}" class="navigation-link">二维码/短链生成</a>
        </li>
        <li class="navigation-item">
          <a href="file-structure.html" class="navigation-link">翻斗花园1.2</a>
        </li>
        <li class="navigation-item">
          <a href="plugins.html" class="navigation-link">翻斗花园1.3</a>
        </li>
        <li class="navigation-item">
          <a href="customization.html" class="navigation-link">翻斗花园1.4</a>
        </li>
        <li class="navigation-item">
          <a href="update.html" class="navigation-link">翻斗花园1.5</a>
        </li>
        <li class="navigation-title">分类二</li>
        <li class="navigation-item">
          <a href="colors.html" class="navigation-link">翻斗花园2.1</a>
        </li>
        <li class="navigation-item">
          <a href="typography.html" class="navigation-link">翻斗花园2.2</a>
        </li>
        <li class="navigation-item">
          <a href="icons.html" class="navigation-link">翻斗花园2.3</a>
        </li>
        <li class="navigation-item">
          <a href="alerts.html" class="navigation-link">翻斗花园2.4</a>
        </li>
        <li class="navigation-item">
          <a href="avatars.html" class="navigation-link">翻斗花园2.5</a>
        </li>
        <li class="navigation-title">分类三</li>
        <li class="navigation-item">
          <a href="badges.html" class="navigation-link">翻斗花园3.1</a>
        </li>
        <li class="navigation-item">
          <a href="buttons.html" class="navigation-link">翻斗花园3.2</a>
        </li>
        <li class="navigation-item">
          <a href="cards.html" class="navigation-link">翻斗花园3.3</a>
        </li>
        <li class="navigation-item">
          <a href="dropdowns.html" class="navigation-link">翻斗花园3.4</a>
        </li>
        <li class="navigation-item">
          <a href="forms.html" class="navigation-link">翻斗花园3.5</a>
        </li>
        <li class="navigation-item">
          <a href="modal.html" class="navigation-link">翻斗花园3.6</a>
        </li>
        <li class="navigation-item">
          <a href="navbar.html" class="navigation-link">翻斗花园3.7</a>
        </li>
        <li class="navigation-item">
          <a href="navs.html" class="navigation-link">翻斗花园3.8</a>
        </li>
        <li class="navigation-item">
          <a href="pagination.html" class="navigation-link">翻斗花园3.9</a>
        </li>
        <li class="navigation-item">
          <a href="progress.html" class="navigation-link">翻斗花园3.10</a>
        </li>
        {{--空白填充--}}
        <li style="height: 3rem"></li>
      </ul>
    </div>
    {{--侧边可滚动导航栏 end--}}
  </aside>

  <section class="content" style="padding-top: 6rem">
    <div class="content-inner content-docs">
      {{--<div class="pt-3 pb-4 mb-4 border-bottom">--}}
      {{-- <p>左侧功能网址介绍</p>--}}
      {{--</div>--}}
      {{--栅格布局 9 6 分--}}
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <h1>左侧功能介绍</h1>
            <h5 class="p-3 mb-2 bg-secondary">1. 二维码/短链生成</h5>
            <p>输入要转换的长链接，点击‘生成’，即可生成对应的短链。</p>
            <img src="http://www.pic.lattiex.com/uploads/img/2024/0305/20240305090851-8703.png" style="max-width:100%;margin-bottom:1rem" alt="none">
            <p><b>二维码生成功能</b></p>
            <p>输入链接，点击‘生成’，在页面上方生成二维码，可选择生成二维码的颜色。</p>
            <img src="http://www.pic.lattiex.com/uploads/img/2024/0305/20240305091608-4378.png" style="max-width:100%;margin-bottom:1rem" alt="none">
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection
@push('script')
@endpush