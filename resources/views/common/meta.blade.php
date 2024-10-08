{{--公公样式文件--}}
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('assets/images/favicon.ico')}}">
    <title>翻斗花园 - @yield('title')</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">

    <!-- animate.css -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/animate.min.css')}}">

    <!-- 重置样式 -->
    {{--<link rel="stylesheet/less" href="{{URL::asset('assets/css/reset.less')}}">--}}

    <!-- 公共样式 -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/demo.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/jquery-scrollbar/css/jquery-scrollbar.css')}}">
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet"--}}
    {{--type="text/css">--}}
    <!-- Google tag (gtag.js) 谷歌统计代码-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FXEJEBMQ8R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-FXEJEBMQ8R');
    </script>
</head>
{{--页面独立的css文件--}}
@stack('css')
