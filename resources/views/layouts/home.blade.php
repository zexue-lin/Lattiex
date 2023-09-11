{{--模板布局页面 父视图--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    {{--  引入样式文件  --}}
    @include('common.meta')
</head>

<body>
{{-- 用于显示主体部分的内容 --}}
@yield('content')
</body>
</html>

{{--引入js文件--}}
@include('common.script')
