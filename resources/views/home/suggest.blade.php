{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','留言')

{{--页面独立的css文件--}}
@push('css')

@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')


    {{--  底部导航  --}}
    @include('common.footer')
@endsection
