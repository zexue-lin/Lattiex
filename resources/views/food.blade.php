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
        <h4>🥬蔬菜</h4>
        <div class="foodBox">
            @foreach($vegetables as $item)
                <div class="common vegetable">{{ $item }}</div>
            @endforeach

        </div>
        <h4>🥩肉类</h4>
        <div class="foodBox">
            @foreach($meats as $item)
                <div class="common meat">{{ $item }}</div>
            @endforeach
        </div>
        <h4>🍚主食</h4>
        <div class="foodBox">
            @foreach($stapleFood as $item)
                <div class="common stapleFood">{{ $item }}</div>
            @endforeach
        </div>
        <h4>🍲菜谱</h4>
        <div class="foodBox" id="menuBox">
            @foreach($menus as $item)
                <div class="common menu">{{ $item }}</div>
            @endforeach
        </div>
    </section>

@endsection


@push('script')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
            // 共享的数组
            let selectedElements = [];

            const menus = document.querySelectorAll('.menu');

            function handleClick(elementsClass, vegetableStyle, meatStyle, stapleFoodStyle) {

                let elements = document.querySelectorAll('.' + elementsClass);

                // div是一个形参，表示当前迭代到的元素，只是一个占位符
                elements.forEach(function (div) {
                    let isClicked = false;

                    div.addEventListener('click', function () {
                        const elementName = this.innerHTML.trim().replace(/[^\u4e00-\u9fa5]/g, ''); // 只保留中文字符

                        if (isClicked) {
                            this.style.background = '';
                            this.style.color = '';
                            selectedElements = selectedElements.filter(item => item !== elementName);
                            isClicked = false;
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
                            isClicked = true;
                        }

                        if (selectedElements.length === 0) {
                            const shuffledMenus = Array.from(menus).sort(() => 0.5 - Math.random())
                            const selectedMenus = shuffledMenus.slice(0, 50);
                            menus.forEach(menu => menu.style.display = 'none');
                            selectedMenus.forEach(menu => menu.style.display = '')
                        } else {
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
                        }

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
        })

    </script>
@endpush
