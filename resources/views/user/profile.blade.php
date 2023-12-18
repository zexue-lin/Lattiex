{{--首页页面 子视图--}}
@extends('layouts.home')

@section('title','个人资料')

{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/profile.css')}}">
@endpush
@section('content')

    {{--  顶部导航  --}}
    @include('common.navbar')

    {{-- 主要内容 --}}
    <main class="main">
        {{--        <section class="profile-container"--}}
        {{--                 style="background-image: url('{{ asset('assets/images/backgrounds/profile-bac.jpg') }}')">--}}
        {{--背景图片暂时不要--}}
        {{--提示框--}}
        @if (session('error'))
            <div class="row justify-content-center">
                <div class="col-lg-8 alert-box-danger">
                    <div
                        class="alert wow fadeInUp alert-danger alert-dismissible fade1 show1"
                        role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fas fa-times"></i></span>
                        <span class="alert-inner--text"><strong>修改失败 </strong> 用户未登录!</span>
                        <button type="button" class="undo" aria-label="Undo">关闭
                        </button>
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        {{--提示框end--}}
        <section class="profile-container">
            <div class="container slice slice-sm">
                <span class="profile-title" style="color: hotpink">个人信息设置</span>
                <div class="user-avatar wow fadeInUp">
                    <img
                        src="{{ optional($LoginUser)['avatar'] ?? URL::asset('assets/images/avatar/default.jpg') }}"
                        class="avatar avatar-lg mr-3"
                        alt="默认头像">
                </div>
                <form class="profile wow fadeInUp" data-wow-delay="200ms" action="{{url('user/profileForm')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nickname" style="color: dodgerblue">昵称</label>
                        <input type="text" class="form-control"
                               value="{{ optional ($LoginUser)['name'] ?? '默认昵称' }}"
                               name="nickname"
                               id="nickname"
                               placeholder="请输入姓名" required/>
                    </div>

                    <div class="form-group">
                        <label for="area" style="color: dodgerblue">所在地</label>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select class="selectpicker" title="省" name="province" id="province">
                                    @foreach($province as $item)
                                        <option
                                            value="{{$item->code}}" {{optional($LoginUser)['province'] == $item->code?'selected':''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="市" name="city" id="city">
                                    @foreach($city as $item)
                                        <option
                                            value="{{$item->code}}" {{optional($LoginUser)['city'] == $item->code?'selected':''}}>{{$item->name}}
                                        </option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="地区" name="district" id="district">
                                    @foreach($district as $item)
                                        <option
                                            value="{{$item->code}}" {{optional($LoginUser)['district'] == $item->code?'selected':''}}>{{$item->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

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
                        <label for="birth" style="color: dodgerblue">生日</label>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                {{--使用 now()->year 获取当前年份，循环获取年份--}}
                                <select class="selectpicker" title="年" name="year" id="year">
                                    @for ($year = now()->year; $year >= 1975; $year--)
                                        <option>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="月" name="month" id="month">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="selectpicker" title="日" name="date" id="date">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                    <option>28</option>
                                    <option>29</option>
                                    <option>30</option>
                                    <option>31</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="email" style="color: dodgerblue">邮箱</label>
                        <input type="email" class="form-control" id="email"
                               value="{{optional($LoginUser)['email']??'example@qq.com'}}"
                               placeholder="请输入邮箱" required/>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="color: dodgerblue">手机号</label>
                        <input type="tel" class="form-control" value="{{optional($LoginUser)['phone']??'110120119'}}"
                               name="phone" id="phone"
                               placeholder="请输入密码"/>
                    </div>
                    <div class="form-group  form-group-secret">
                        <label for="password" style="color: dodgerblue">密码</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="留空默认不修改密码"
                        />
                    </div>

                    <div class="profile-btn">
                        <button type="submit" class="btn btn-primary btn-animated btn-animated-x">
                            <span class="btn-inner--visible">确认修改</span>
                            <span class="btn-inner--hidden"><i class="fas fa-arrow-right"></i></span>
                        </button>
                    </div>

                </form>
            </div>
        </section>

    </main>
    {{--  底部导航  --}}
    {{--@include('common.footer')--}}

@endsection

@push('script')
    {{--    <script src="https://api.vvhan.com/api/yinghua"></script>--}}

    <script>
        $('#province').change(function () {
            let code = $(this).val();

            $.ajax({
                type: 'POST',
                url: "{{url('user/area')}}",
                data: {
                    code
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    // 定义空的字符变量
                    let option = ''

                    // 循环遍历查到的数据
                    for (let item of res.data) {
                        option += `<option value="${item.code}">${item.name}</option>`
                    }
                    // 插入到id为city的元素中
                    $('#city').html(option)

                    // 刷新selectpicker插件
                    $('.selectpicker').selectpicker('refresh');
                    GetCity(res.data[0].code, '#district')
                },
                error: function () {
                    console.log('查询失败，无此地区')
                }
            })
        })

        // 根据城市查地区
        $('#city').change(function () {
            let code = $(this).val()

            $.ajax({
                type: 'post',
                url: `{{url('user/area')}}`,
                data: {
                    code
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function (res) {
                    // 查询失败的状态码

                    // 定义空的字符变量
                    let option = ''
                    // 循环遍历返回的数据,
                    for (let item of res.data) {
                        option += `<option value="${item.code}">${item.name}</option>`;
                    }
                    // 插入到id为district的元素中,同上一个
                    $('#district').html(option)

                    // 刷新selectpicker插件
                    $('.selectpicker').selectpicker('refresh');
                }
            })
        })

        // 默认选中的地区
        function GetCity(code, element) {
            $.ajax({
                type: 'post',
                url: `{{url('user/area')}}`,
                data: {
                    code
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function (res) {
                    // 查询失败的状态码
                    // console.log(res)
                    if (res.code === 0) {
                        return false
                    }

                    // 定义空的字符变量
                    let option = ''
                    // 循环遍历返回的数据(地区district)
                    for (let item of res.data) {
                        option += `<option value="${item.code}">${item.name}</option>`;
                    }
                    // 插入到id为element的元素中，这里的element就是id为district的元素
                    $(element).html(option)

                    // 刷新selectpicker插件
                    $('.selectpicker').selectpicker('refresh');
                }
            })
        }
    </script>
@endpush
