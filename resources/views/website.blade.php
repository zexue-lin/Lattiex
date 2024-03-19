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
{{-- 顶部导航  --}}
@include('common.navbar')
{{-- 主体内容  --}}
<main class="main">
  {{--侧边可滚动导航栏--}}
  {{-- @include('common.scrollbar') --}}
  <section class="content" style="margin-top: 62px">
    <div class="content-inner content-docs">
      {{--<div class="pt-3 pb-4 mb-4 border-bottom">--}}
      {{-- --}}
      {{--</div>--}}
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h2 id="tools" style="margin-bottom: 1.5rem;">工具类网站</h2>
          <div class="row item_row">
            @foreach($websites1 as $item)
              <div class="card_web" data-toggle="tooltip" data-placement="bottom" title="{{$item->toggle_title}}">
                  <a href="{{$item->href}}" style="text-decoration: none;" target="_blank">
                    <div style="width: 12rem;">
                        <div class="card_web-body">
                          <div>
                            <img class="avatar avatar-sms" src="http://www.google.com/s2/favicons?domain={{$item->href}}" alt="Website Icon"></img>
                          </div>
                          <div class="card_web-body2">
                               <h5 class="card_web-title">{{$item->title}}</h5>
                                <p class="card_web-text">{{$item->text}}</p>
                          </div>
                        </div>
                  </div>
                </a>
              </div>
           @endforeach
          </div>

          <h2 id="downloads" style="margin-bottom: 1.5rem">下载类网站</h2>
          <div class="row item_row">
            @foreach($websites2 as $item)
              <div class="card_web" data-toggle="tooltip" data-placement="bottom" title="{{$item->toggle_title}}">
                  <a href="{{$item->href}}" style="text-decoration: none;" target="_blank">
                    <div style="width: 12rem;">
                        <div class="card_web-body">
                          <div>
                            <img class="avatar avatar-sms" src="http://www.google.com/s2/favicons?domain={{$item->href}}" alt="Website Icon"></img>
                          </div>
                          <div class="card_web-body2">
                               <h5 class="card_web-title">{{$item->title}}</h5>
                                <p class="card_web-text">{{$item->text}}</p>
                          </div>
                        </div>
                  </div>
                </a>
              </div>
           @endforeach
          </div>
          {{-- <h2 id="downloads" style="margin-bottom: 1.5rem">下载类网站</h2>
          <div class="row item_row">
            <div class="col-lg-12">
              <div class="card-website">
                @foreach($websites2 as $item)
                <div class="list-group">
                  <a href="{{$item->href}}" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                    <div class="list-group-img">
                      {{-- <span class="avatar bg-purple">http://www.google.com/s2/favicons?domain={{$item->href}}</span>--}}
                      {{-- <img class="avatar" src="http://www.google.com/s2/favicons?domain={{$item->href}}" alt="Website Icon"></img>
                    </div>
                    <div class="list-group-content">
                      <div class="list-group-heading"><b>{{$item->title}}</b>
                        <small>{{$item->id}}</small>
                      </div>
                      <p class="text-sm">{{$item->text}}</p>
                    </div>
                  </a>
                </div>
                @endforeach
              </div>
            </div>
          </div> --}}

        </div>
        {{--右侧浮动导航栏--}}
        <div class="col-lg-3 d-none d-lg-inline-block">
          <div class="sidebar-sticky" data-stick-in-parent="true">
            <ul class="section-nav">
              <li class="toc-entry toc-h3"><a href="#tools">工具类网站</a></li>
              <li class="toc-entry toc-h3"><a href="#downloads">下载类网站</a></li>
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
                <a class="nav-link active" href="https://instagram.com/webpixelsofficial" target="_blank"><i class="fab fa-instagram"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://facebook.com/webpixels" target="_blank"><i class="fab fa-facebook"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://github.com/webpixels" target="_blank"><i class="fab fa-github"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://dribbble.com/webpixels" target="_blank"><i class="fab fa-dribbble"></i></a>
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