<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">翻斗花园</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_example_1"
            aria-controls="navbar_example_1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar_example_1">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">首页 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/website')}}">AAA农家土鸡蛋</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">AAA水果批发</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbar_1_dropdown_1" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">更多</a>
                <div class="dropdown-menu" aria-labelledby="navbar_1_dropdown_1">
                    <a class="dropdown-item" href="#">行动</a>
                    <a class="dropdown-item" href="#">其他行动</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">常用正版软件下载地址</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/contact')}}">留言</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">这个不可以点</a>
            </li>

        </ul>
        {{-- 搜索框 --}}
        <div class="search_form">
            <button>
                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                     aria-labelledby="search">
                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                          stroke="currentColor" stroke-width="1.333" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
            </button>
            <input class="searcg_input" placeholder="搜索你想要的内容" required="" type="text">
            <button class="reset" type="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        {{-- 搜索框end --}}
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="#"><i class="fas fa-cogs"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" id="navbar_1_dropdown_2" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xl py-0">
                    <div class="py-3 px-3">
                        <h5 class="heading h6 mb-0">通知中心</h5>
                    </div>
                    <div class="list-group">
                        {{--三个虚拟通知 假数据--}}
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <div class="list-group-img">
                                <span class="avatar bg-purple">JD</span>
                            </div>
                            <div class="list-group-content">
                                <div class="list-group-heading">Johnyy Depp <small>10:05 PM</small></div>
                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipiscing eiusmod tempor</p>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <div class="list-group-img">
                                <span class="avatar bg-pink">TC</span>
                            </div>
                            <div class="list-group-content">
                                <div class="list-group-heading">Tom Cruise <small>10:05 PM</small></div>
                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipiscing eiusmod tempor</p>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <div class="list-group-img">
                                <span class="avatar bg-blue">WS</span>
                            </div>
                            <div class="list-group-content">
                                <div class="list-group-heading">Will Smith <small>10:05 PM</small></div>
                                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipiscing eiusmod tempor</p>
                            </div>
                        </a>
                    </div>
                    <div class="py-3 text-center">
                        <a href="#" class="link link-sm link--style-3">查看所有消息</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                {{--                <a class="nav-link nav-link-icon" href="#" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown"--}}
                {{--                   aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>--}}
                @if(!empty($LoginUser))
                    <a class="nav-link" href="#" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><img
                            src="{{URL::asset('uploads/'.$LoginUser['avatar'])}}" alt="User Avatar"
                            class="avatar avatar-sm"></a>
                @else
                    <a class="nav-link" href="#" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><img
                            src="{{URL::asset('uploads/users/default.png')}}" alt="Default Avatar"
                            class="avatar avatar-sm"></a>
                @endif
                <div class="dropdown-menu dropdown-menu-right">
                    <h6 class="dropdown-header">用户菜单</h6>
                    <a class="dropdown-item" href="{{url('user/login')}}">
                        <i class="fas fa-anchor text-primary"></i>登录
                    </a>
                    <a class="dropdown-item" href="#">
                        <span class="float-right badge badge-primary">4</span>
                        <i class="fas fa-envelope text-primary"></i>信息
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cog text-primary"></i>设置
                    </a>
                    <a class="dropdown-item" href="{{url('user/profile')}}">
                        <i class="fas  fa-address-card text-primary"></i>个人资料
                    </a>
                    <div class="dropdown-divider" role="presentation"></div>
                    {{--<a class="dropdown-item" href="#">--}}
                    {{--    <i class="fas fa-sign-out-alt text-primary"></i>退出登录--}}
                    {{--</a>--}}
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#modal_5">
                        <i class="fas fa-sign-out-alt text-primary"></i>
                        退出登录
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- 退出登录Modal -->
    <div class="modal modal-danger fade" id="modal_5" tabindex="-1" role="dialog" aria-labelledby="modal_5"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title_6">再多一眼，看一眼就会爆炸。</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="fas fa-exclamation-circle fa-4x"></i>
                        <h4 class="heading mt-4">确定要退出登录吗?</h4>
                        <p>
                            You can easy create stackable modal boxes. For example, your inline content or Ajax response
                            can contain a gallery:
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">是的,确定</button>
                </div>
            </div>
        </div>
    </div>
</nav>

