{{--模板布局页面 父视图--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    {{--  引入样式文件  --}}
    @include('common.meta')
    <style>
        .loading {
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
            background: rgba(250, 250, 250, .9);
        }

        #outline {
            stroke-dasharray: 2.42777px, 242.77666px;
            stroke-dashoffset: 0;
            -webkit-animation: anim 1.6s linear infinite;
            animation: anim 1.6s linear infinite;

        }

        @-webkit-keyframes anim {
            12.5% {
                stroke-dasharray: 33.98873px, 242.77666px;
                stroke-dashoffset: -26.70543px;
            }

            43.75% {
                stroke-dasharray: 84.97183px, 242.77666px;
                stroke-dashoffset: -84.97183px;
            }

            100% {
                stroke-dasharray: 2.42777px, 242.77666px;
                stroke-dashoffset: -240.34889px;
            }
        }

        @keyframes anim {
            12.5% {
                stroke-dasharray: 33.98873px, 242.77666px;
                stroke-dashoffset: -26.70543px;
            }

            43.75% {
                stroke-dasharray: 84.97183px, 242.77666px;
                stroke-dashoffset: -84.97183px;
            }

            100% {
                stroke-dasharray: 2.42777px, 242.77666px;
                stroke-dashoffset: -240.34889px;
            }
        }
    </style>

</head>

<body>
<div id="pjax-container">
    {{-- 用于显示主体部分的内容 --}}
    @yield('content')
</div>
<div class="loading" style="display: none">
    <svg style="left: 50%;
        top: 50%;
        position: relative;
        transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);" preserveAspectRatio="xMidYMid meet"
         viewBox="0 0 187.3 93.7" height="300px" width="400px">
        <path
            d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z"
            stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="4" fill="none"
            id="outline" stroke="#4E4FEB"></path>
        <path
            d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z"
            stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="4" stroke="#4E4FEB"
            fill="none" opacity="0.05" id="outline-bg"></path>
    </svg>

</div>
</body>
</html>
{{--引入js文件--}}
@include('common.script')
<script type="text/javascript">
    // 加载动画的第一种方式，通过pjax
    $(document).pjax('a:not(a[target="_blank"],a[no-pjax])', '#pjax-container', {timeout: 3000});
    $(document).on('pjax:send', function () {
        $(".loading").css("display", "block");
    });
    $(document).on('pjax:complete', function () {
        //回调函数
        $(".loading").css("display", "none");
    });
    // 获取动画加载，第二种方式，通过判断页面加载
    // let loading = document.querySelector(".loading");
    // // 加载完成事件
    // window.onload = function () {
    //     // 加载完成，隐藏动画，显示内容
    //     loading.style.display = "none";
    // }
</script>
