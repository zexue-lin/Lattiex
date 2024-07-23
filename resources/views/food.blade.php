{{-- 首页页面 子视图 --}}
@extends('layouts.home')

@section('title','今天吃什么')

<meta name="csrf-token" content="{{ csrf_token() }}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/food.css')}}">
@endpush

@section('content')
    {{--  顶部导航  --}}
    @include('common.navbar')
    <section class="slice-lg">
        <h2>今天周二 早班</h2>
        <h2>蔬菜</h2>
        <div class="foodBox">
            @foreach($vegetables as $item)
                <div class="common vegetable">{{ $item }}</div>
            @endforeach

        </div>
        <h2>肉类</h2>
        <div class="foodBox">
            @foreach($meats as $item)
                <div class="common meat">{{ $item }}</div>
            @endforeach
        </div>
        <h2>主食</h2>
        <div class="foodBox">
            @foreach($stapleFood as $item)
                <div class="common stapleFood">{{ $item }}</div>
            @endforeach
        </div>
        <h2>菜谱</h2>
        <div class="foodBox" id="menuBox">
            @foreach($menus as $item)
                <div class="common menu">{{ $item }}</div>
            @endforeach
        </div>
    </section>

@endsection


@push('script')
    <script type="text/javascript">

        // 共享的数组
        var selectedElements = [];

        const menus = document.querySelectorAll('.menu');

        function handleClick(elementsClass, vegetableStyle, meatStyle, stapleFoodStyle) {

            var elements = document.querySelectorAll('.' + elementsClass);

            elements.forEach(function (div) {
                var isCilcked = false;

                div.addEventListener('click', function () {
                    const elementName = this.innerHTML.trim().replace(/[^\u4e00-\u9fa5]/g, ''); // 只保留中文字符

                    if (isCilcked) {
                        this.style.background = '';
                        this.style.color = '';
                        selectedElements = selectedElements.filter(item => item !== elementName);
                        isCilcked = false;
                    } else {
                        if (elementsClass === 'vegetable') {
                            this.style.background = vegetableStyle.backgroundColor;
                            this.style.color = vegetableStyle.color;
                        } else if (elementsClass === 'meat') {
                            this.style.background = meatStyle.backgroundColor;
                            this.style.color = meatStyle.color;
                        } else if (elementsClass === 'stapleFood') {
                            this.style.background = stapleFoodStyle.backgroundColor;
                            this.style.color = stapleFoodStyle.color;
                        }
                        selectedElements.push(elementName);
                        isCilcked = true;
                    }
                    console.log(selectedElements)
                    menus.forEach(function (menu) {
                        const menuName = menu.innerHTML.trim().replace(/[^\u4e00-\u9fa5]/g, ''); // 只保留中文字符

                        let isMatch = selectedElements.some(function (element) {
                            return menuName.includes(element);
                        })

                        if (isMatch) {
                            menu.style.display = ''; // 显示匹配的菜单项
                        } else {
                            menu.style.display = 'none'; // 隐藏不匹配的菜单项
                        }
                    })
                })
            })
        }


        const vegetableStyle = {
            backgroundColor: 'rgb(22,163,74,1)',
            color: '#DCFCE7'
        }

        const meatStyle = {
            backgroundColor: '#EF4444E6',
            color: '#FEE2E2'
        }
        const stapleFoodStyle = {
            backgroundColor: '#EAB308',
            color: '#FEF9C3'
        }
        handleClick('vegetable', vegetableStyle, {}, {});
        handleClick('meat', {}, meatStyle, {});
        handleClick('stapleFood', {}, {}, stapleFoodStyle);

    </script>
@endpush
