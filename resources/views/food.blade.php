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
        <h1>{{ $message }}</h1>
        <h2>蔬菜</h2>
        <div class="foodBox">
            <div class="common vegetable">🥦花菜</div>
            <div class="common vegetable">🥬白菜</div>
            <div class="common vegetable">🥕胡萝卜</div>
        </div>
        <h2>肉类</h2>
        <div class="foodBox">
            <div class="common meat">🐷猪肉</div>
            <div class="common meat">🍖排骨</div>
        </div>
        <h2>主食</h2>
        <div class="foodBox">
            <div class="common stapleFood">🍚米饭</div>
            <div class="common stapleFood">🍝面条</div>
            <div class="common stapleFood">🍜方便面</div>
        </div>
        <h2>菜谱</h2>
        <div class="foodBox">
            <div class="common menu">🥔🐔土豆鸡块</div>
        </div>
    </section>

@endsection


@push('script')
    <script type="text/javascript">
        // 共享的数组
        var selectedElements = [];

        function handleClick(elementsClass, vegetableStyle, meatStyle, stapleStyle) {

            var elements = document.querySelectorAll('.' + elementsClass);

            elements.forEach(function (div) {
                var isCilcked = false;

                div.addEventListener('click', function () {
                    var elementname = this.innerHTML.trim();

                    if (isCilcked) {
                        this.style.background = '';
                        this.style.color = '';
                        selectedElements = selectedElements.filter(item => item !== elementname);
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
                        selectedElements.push(elementname);
                        isCilcked = true;
                    }
                    console.log(selectedElements)
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
